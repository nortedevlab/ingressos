import React from "react";
import {BrowserRouter, Routes, Route, Navigate, Outlet} from "react-router-dom";
import Home from "./pages/public/Home";
import Login from "./pages/public/Login";
import Dashboard from "./pages/authorized/Dashboard";
import Profile from "./pages/authorized/Profile";
import {useAuth} from "./context/AuthContext";

// Layout que protege todas as rotas internas
const PrivateLayout: React.FC = () => {
    const {user, loading} = useAuth();

    if (loading) return <p>Carregando...</p>;
    if (!user) return <Navigate to="/login" replace/>;

    return <Outlet/>; // renderiza as rotas filhas autenticadas
};

const AppRoutes: React.FC = () => {
    return (
        <BrowserRouter>
            <Routes>
                {/* Públicas */}
                <Route path="/" element={<Home/>}/>
                <Route path="/login" element={<Login/>}/>

                {/* Autenticadas (todas agrupadas) */}
                <Route element={<PrivateLayout/>}>
                    <Route path="/dashboard" element={<Dashboard/>}/>
                    <Route path="/profile" element={<Profile/>}/>
                </Route>
            </Routes>
        </BrowserRouter>
    );
};

export default AppRoutes;
