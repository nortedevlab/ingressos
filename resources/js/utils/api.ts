import axios from "axios";

const api = axios.create({
    baseURL: "/",
    withCredentials: true,
    headers: {
        "X-Requested-With": "XMLHttpRequest",
        "Accept": "application/json",
        "Content-Type": "application/json",
    },
});

// Configurações globais do axios
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

// Função para definir o token de autorização
export const setAuthToken = (token: string | null) => {
    if (token) {
        api.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    } else {
        delete api.defaults.headers.common['Authorization'];
    }
};

// Função para obter o token do localStorage
export const getStoredToken = (): string | null => {
    return localStorage.getItem('auth_token');
};

// Função para salvar o token no localStorage
export const setStoredToken = (token: string | null) => {
    if (token) {
        localStorage.setItem('auth_token', token);
        setAuthToken(token);
    } else {
        localStorage.removeItem('auth_token');
        setAuthToken(null);
    }
};

// Configurar token inicial se existir
const storedToken = getStoredToken();
if (storedToken) {
    setAuthToken(storedToken);
}

// Interceptor para tratar respostas
api.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response?.status === 401) {
            // Limpar token inválido
            setStoredToken(null);
            // Redirecionar para login
            window.location.href = "/login";
        }
        return Promise.reject(error);
    }
);

// Interceptor para adicionar token automaticamente se não estiver presente
api.interceptors.request.use(
    (config) => {
        // Se não há Authorization header e existe token armazenado
        if (!config.headers.Authorization && getStoredToken()) {
            config.headers.Authorization = `Bearer ${getStoredToken()}`;
        }
        return config;
    },
    (error) => Promise.reject(error)
);

export default api;
