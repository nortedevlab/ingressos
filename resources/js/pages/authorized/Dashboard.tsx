import React from "react";
import {useAuth} from "../../context/AuthContext";
import {Link} from "react-router-dom";

const Dashboard: React.FC = () => {
    const {user, logout} = useAuth();

    return (
        <div>
            <h1>📊 Dashboard</h1>
            <p>Olá, {user?.name}!</p>
            <nav>
                <Link to="/profile">Perfil</Link> |{" "}
                <button onClick={logout}>Sair</button>
            </nav>
        </div>
    );
};

export default Dashboard;
