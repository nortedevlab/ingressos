import React from "react";
import {Link, useOutletContext} from "react-router-dom";
import {useAuth, User} from "../../../context/AuthContext";

const AdminDashboard: React.FC = () => {
    const {logout} = useAuth();
    const {user} = useOutletContext<{ user: User }>();

    return (
        <div>
            <h1>📊 Dashboard</h1>
            <p>Olá, {user.name}!</p>
            <nav>
                <Link to="/profile">Perfil</Link> |{" "}
                <button onClick={logout}>Sair</button>
            </nav>
        </div>
    );
};

export default AdminDashboard;
