import React from "react";
import {BrowserRouter, Routes, Route, Navigate, Outlet} from "react-router-dom";
import PrivateLayout from "./components/layout/PrivateLayout";
import Routing from "./pages/authorized/Routing";
import AdminLayout from "./components/layout/AdminLayout";
import AdminDashboard from "./pages/authorized/admin/AdminDashboard";
import PublicLayout from "./components/layout/PublicLayout";
import Home from "./pages/public/Home";
import Login from "./pages/public/Login";
import AccountLayout from "./components/layout/AccountLayout";
import Account from "./pages/authorized/account/Account";
import ProfileForm from "./pages/authorized/account/ProfileForm";
import PasswordForm from "./pages/authorized/account/PasswordForm";

const AppRoutes: React.FC = () => {
    return (
        <BrowserRouter>
            <Routes>
                {/* Públicas */}
                <Route element={<PublicLayout/>}>
                    <Route path="/" element={<Home/>}/>
                    <Route path="login" element={<Login/>}/>
                </Route>

                {/* Autenticadas */}
                <Route element={<PrivateLayout/>}>
                    <Route path="routing" element={<Routing/>}/>

                    {/* Grupo /admin */}
                    <Route path="admin" element={<AdminLayout/>}>
                        <Route index element={<AdminDashboard/>}/> {/* /admin */}
                        {/* Adicione mais rotas aqui → /admin/qualquer-coisa */}
                    </Route>

                    {/* Grupo /account */}
                    <Route path="account" element={<AccountLayout/>}>
                        <Route index element={<Account/>}/> {/* /account */}
                        <Route path="profile" element={<ProfileForm/>}/>
                        <Route path="password" element={<PasswordForm/>}/>
                    </Route>
                </Route>
            </Routes>
        </BrowserRouter>
    );
};

export default AppRoutes;
