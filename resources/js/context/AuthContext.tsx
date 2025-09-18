import React, {createContext, useContext, useState, useEffect, ReactNode} from "react";
import api, {setStoredToken, getStoredToken} from "../utils/api";

interface Permission {
    id: number;
    name: string;
    slug: string;
}

interface Group {
    id: number;
    name: string;
    slug: string;
    permissions: Permission[];
}

interface User {
    id: number;
    name: string;
    email: string;
    group?: Group;
}

interface AuthContextType {
    user: User | null;
    loading: boolean;
    login: (email: string, password: string) => Promise<void>;
    logout: () => Promise<void>;
    hasPermission: (permission: string) => boolean;
}

const AuthContext = createContext<AuthContextType | undefined>(undefined);

export const AuthProvider: React.FC<{ children: ReactNode }> = ({children}) => {
    const [user, setUser] = useState<User | null>(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        checkAuth();
    }, []);

    const checkAuth = async () => {
        try {
            // Só verificar se há token armazenado
            if (getStoredToken()) {
                const response = await api.get("/api/me");
                setUser(response.data.user ?? null);
            }
        } catch (error) {
            console.error('Erro ao verificar autenticação:', error);
            setUser(null);
            setStoredToken(null); // Limpar token inválido
        } finally {
            setLoading(false);
        }
    };

    const login = async (email: string, password: string) => {
        try {
            // Para SPA com Sanctum, primeiro obter CSRF cookie
            await api.get('/sanctum/csrf-cookie');

            // Fazer login
            const response = await api.post("/api/login", {email, password});

            // Se retornou token, salvar
            if (response.data.token) {
                setStoredToken(response.data.token);
            }

            setUser(response.data.user);
        } catch (error) {
            console.error('Erro no login:', error);
            throw error;
        }
    };

    const logout = async () => {
        try {
            await api.post("/api/logout");
        } catch (error) {
            console.error('Erro no logout:', error);
        } finally {
            // Sempre limpar dados locais
            setUser(null);
            setStoredToken(null);
        }
    };

    const hasPermission = (permission: string): boolean => {
        if (!user?.group?.permissions) return false;
        return user.group.permissions.some(p => p.slug === permission);
    };

    return (
        <AuthContext.Provider value={{user, loading, login, logout, hasPermission}}>
            {children}
        </AuthContext.Provider>
    );
};

export const useAuth = () => {
    const context = useContext(AuthContext);
    if (!context) throw new Error("useAuth deve ser usado dentro de AuthProvider");
    return context;
};
