import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import { useAuth } from "../../context/AuthContext";

const Login: React.FC = () => {
    const { login } = useAuth();
    const navigate = useNavigate();

    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState<string | null>(null);
    const [loading, setLoading] = useState(false);

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        setError(null);
        setLoading(true);

        try {
            await login(email, password);
            navigate("/dashboard");
        } catch (err: any) {
            setError(err.response?.data?.message ?? "Erro ao autenticar");
        } finally {
            setLoading(false);
        }
    };

    return (
        <div style={{ maxWidth: "400px", margin: "50px auto" }}>
            <h1>🔑 Login</h1>

            {error && <p style={{ color: "red" }}>{error}</p>}

            <form onSubmit={handleSubmit}>
                <div>
                    <label>Email</label>
                    <input
                        type="email"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                        required
                    />
                </div>

                <div style={{ marginTop: "10px" }}>
                    <label>Senha</label>
                    <input
                        type="password"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        required
                    />
                </div>

                <button
                    type="submit"
                    disabled={loading}
                    style={{ marginTop: "15px" }}
                >
                    {loading ? "Entrando..." : "Entrar"}
                </button>
            </form>
        </div>
    );
};

export default Login;
