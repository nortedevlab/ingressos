import React, {useState} from "react";
import {Box, Button, TextField, Snackbar, Alert} from "@mui/material";
import api from "../../../utils/api";
import AvatarUpload from "../../../components/upload/AvatarUpload";
import {useOutletContext} from "react-router-dom";
import {useAuth, User} from "../../../context/AuthContext";

const ProfileForm: React.FC = () => {
    const {user} = useOutletContext<{ user: User }>();
    const {setUser} = useAuth();
    const [name, setName] = useState(user.name);
    const [email, setEmail] = useState(user.email);
    const [avatarFile, setAvatarFile] = useState<File | null>(null);
    const [success, setSuccess] = useState<string | null>(null);
    const [error, setError] = useState<string | null>(null);

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        try {
            const formData = new FormData();
            formData.append("name", name);
            formData.append("email", email);
            if (avatarFile) {
                formData.append("avatar", avatarFile);
            }

            const response = await api.post("/api/user/profile", formData, {
                headers: {"Content-Type": "multipart/form-data"},
            });

            setSuccess("Perfil atualizado com sucesso!");

            setUser(response.data.user);
        } catch (err: any) {
            setError(err.response?.data?.message ?? "Erro ao atualizar perfil");
        }
    };

    return (
        <Box component="form" onSubmit={handleSubmit}>
            <TextField label="Nome" value={name} onChange={e => setName(e.target.value)} fullWidth margin="normal"/>
            <TextField label="Email" value={email} onChange={e => setEmail(e.target.value)} fullWidth margin="normal"/>
            <AvatarUpload onFileSelected={setAvatarFile}/>
            <Button type="submit" variant="contained" sx={{mt: 2}}>Salvar</Button>

            <Snackbar open={!!success} autoHideDuration={4000} onClose={() => setSuccess(null)}>
                <Alert severity="success">{success}</Alert>
            </Snackbar>
            <Snackbar open={!!error} autoHideDuration={4000} onClose={() => setError(null)}>
                <Alert severity="error">{error}</Alert>
            </Snackbar>
        </Box>
    );
};

export default ProfileForm;
