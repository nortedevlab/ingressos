import React, { useEffect } from "react";
import { useAuth } from "../../context/AuthContext";
import { useNavigate } from "react-router-dom";

const Routing: React.FC = () => {
    const { user, loading } = useAuth();
    const navigate = useNavigate();

    useEffect(() => {
        if (loading) return; // evita redirecionar enquanto carrega usuário

        if (user) {
            // Se o usuário tiver grupo, redireciona, senão manda para dashboard padrão
            const target = `/${user.group?.slug ?? ""}`;
            navigate(target, { replace: true });

            // Evita redirecionar se já estiver no destino
            if (window.location.pathname !== target) {
                navigate(target, { replace: true });
            }
        } else {
            // Se não estiver logado, vai para login
            if (window.location.pathname !== "/login") {
                navigate("/login", { replace: true });
            }
        }
    }, [user, loading, navigate]);

    return (
        <div style={{ textAlign: "center", marginTop: "50px" }}>
            <h1>🛣️ Redirecionando...</h1>
            <p>Aguarde enquanto verificamos seu acesso...</p>
        </div>
    );
};

export default Routing;
