import React from "react";
import { Navigate, Outlet } from "react-router-dom";
import { useAuth } from "../../context/AuthContext";
import FullscreenLoader from "../loading/FullscreenLoader";

const PrivateLayout: React.FC = () => {
    const { user, loading } = useAuth();

    if (loading) return <FullscreenLoader message="Por favor, aguarde..." />;
    if (!user) return <Navigate to="/login" replace />;

    // passa o user para qualquer rota filha
    return <Outlet context={{ user }} />;
};

export default PrivateLayout;
