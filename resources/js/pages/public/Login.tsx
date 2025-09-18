import React from "react";
import {useAuth} from "../../context/AuthContext";
import {useNavigate} from "react-router-dom";

const Login: React.FC = () => {
    const {login} = useAuth();
    const navigate = useNavigate();

    const handleLogin = () => {
        // Exemplo: simula login
        const fakeUser = {id: 1, name: "Alessandro", email: "alessandro@example.com"};
        login(fakeUser);
        navigate("/dashboard");
    };

    return (
        <div>
            <h1>🔑 Login</h1>
            <button onClick={handleLogin}>Entrar</button>
        </div>
    );
};

export default Login;
