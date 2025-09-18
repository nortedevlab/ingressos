import React from "react";
import {Link} from "react-router-dom";

const Home: React.FC = () => (
    <div>
        <h1>🌐 Página Pública</h1>
        <p>Bem-vindo! Qualquer um pode acessar esta página.</p>
        <Link to="/login">Fazer login</Link>
    </div>
);

export default Home;
