import React, { useState } from "react";
import { Box, Button, TextField, Snackbar, Alert } from "@mui/material";
import api from "../../../utils/api";

const PasswordForm: React.FC = () => {
    const [currentPassword, setCurrentPassword] = useState("");
    const [newPassword, setNewPassword] = useState("");
    const [confirmPassword, setConfirmPassword] = useState("");
    const [success, setSuccess] = useState<string | null>(null);
    const [error, setError] = useState<string | null>(null);

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        try {
            await api.post("/api/user/password", {
                current_password: currentPassword,
                new_password: newPassword,
                new_password_confirmation: confirmPassword,
            });
            setSuccess("Senha alterada com sucesso!");
        } catch (err: any) {
            setError(err.response?.data?.message ?? "Erro ao alterar senha");
        }
    };

    return (
        <Box component="form" onSubmit={handleSubmit}>
            <TextField label="Senha Atual" type="password" value={currentPassword} onChange={e => setCurrentPassword(e.target.value)} fullWidth margin="normal" />
            <TextField label="Nova Senha" type="password" value={newPassword} onChange={e => setNewPassword(e.target.value)} fullWidth margin="normal" />
            <TextField label="Confirme a Nova Senha" type="password" value={confirmPassword} onChange={e => setConfirmPassword(e.target.value)} fullWidth margin="normal" />
            <Button type="submit" variant="contained" sx={{ mt: 2 }}>Alterar Senha</Button>

            <Snackbar open={!!success} autoHideDuration={4000} onClose={() => setSuccess(null)}>
                <Alert severity="success">{success}</Alert>
            </Snackbar>
            <Snackbar open={!!error} autoHideDuration={4000} onClose={() => setError(null)}>
                <Alert severity="error">{error}</Alert>
            </Snackbar>
        </Box>
    );
};

export default PasswordForm;
