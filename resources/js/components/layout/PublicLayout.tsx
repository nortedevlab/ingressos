import React from "react";
import {Outlet, Link} from "react-router-dom";
import {
    AppBar,
    Box,
    Button,
    Container,
    CssBaseline,
    Toolbar,
    Typography,
} from "@mui/material";
import UserMenu from "../menu/UserMenu";
import {useAuth} from "../../context/AuthContext";
import FullscreenLoader from "../loading/FullscreenLoader";

const PublicLayout: React.FC = () => {
    const {user, loading} = useAuth();

    if (loading) return <FullscreenLoader message="Por favor, aguarde..."/>;

    return (
        <Box sx={{display: "flex", flexDirection: "column", minHeight: "100vh"}}>
            <CssBaseline/>

            {/* Navbar */}
            <AppBar position="static" color="primary">
                <Toolbar>
                    <Typography
                        variant="h6"
                        component={Link}
                        to="/"
                        sx={{
                            flexGrow: 1,
                            textDecoration: "none",
                            color: "inherit",
                            fontWeight: "bold",
                        }}
                    >
                        Meu Sistema
                    </Typography>
                    {user ? <UserMenu user={user}/> : (
                        <>
                            <Button color="inherit" component={Link} to="/register">
                                Registre-se
                            </Button>
                            <Button color="inherit" component={Link} to="/login">
                                Login
                            </Button>
                        </>
                    )}
                </Toolbar>
            </AppBar>

            {/* Conteúdo principal */}
            <Container component="main" sx={{flex: 1, py: 4}}>
                <Outlet/>
            </Container>

            {/* Rodapé */}
            <Box component="footer" sx={{py: 2, textAlign: "center", bgcolor: "grey.200"}}>
                <Typography variant="body2" color="textSecondary">
                    © {new Date().getFullYear()} Meu Sistema. Todos os direitos reservados.
                </Typography>
            </Box>
        </Box>
    );
};

export default PublicLayout;
