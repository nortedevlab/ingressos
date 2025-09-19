import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import {
    Alert,
    Box,
    Button,
    CircularProgress,
    TextField,
    Typography,
} from "@mui/material";
import { useAuth } from "../../context/AuthContext";

const Login: React.FC = () => {
    const { login, user, loading } = useAuth();
    const navigate = useNavigate();

    const [email, setEmail] = useState("alessandro.souza@norte.dev.br");
    const [password, setPassword] = useState("password");
    const [error, setError] = useState<string | null>(null);
    const [submitting, setSubmitting] = useState(false);

    /** Se já estiver logado, redireciona direto para /routing */
    useEffect(() => {
        if (!loading && user) {
            navigate("/routing", { replace: true });
        }
    }, [user, loading, navigate]);

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        setError(null);
        setSubmitting(true);

        try {
            await login(email, password);
            navigate("/routing", { replace: true });
        } catch (err: any) {
            setError(err.response?.data?.message ?? "Erro ao autenticar");
        } finally {
            setSubmitting(false);
        }
    };

    return (
        <Box sx={{ maxWidth: 400, mx: "auto", mt: 8 }}>
            <Typography variant="h4" component="h1" gutterBottom>
                🔑 Login
            </Typography>

            {error && (
                <Alert severity="error" sx={{ mb: 2 }}>
                    {error}
                </Alert>
            )}

            <form onSubmit={handleSubmit}>
                <TextField
                    label="Email"
                    type="email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    fullWidth
                    required
                    margin="normal"
                />

                <TextField
                    label="Senha"
                    type="password"
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}
                    fullWidth
                    required
                    margin="normal"
                />

                <Button
                    type="submit"
                    fullWidth
                    variant="contained"
                    color="primary"
                    sx={{ mt: 2 }}
                    disabled={submitting}
                >
                    {submitting ? <CircularProgress size={24} color="inherit" /> : "Entrar"}
                </Button>
            </form>
        </Box>
    );
};

export default Login;
