import React, {useState} from "react";
import {Outlet, useNavigate, useOutletContext} from "react-router-dom";
import {
    AppBar,
    Box,
    CssBaseline,
    Divider,
    Drawer,
    IconButton,
    List,
    ListItem,
    ListItemButton,
    ListItemIcon,
    ListItemText,
    Toolbar,
    Typography,
} from "@mui/material";
import MenuIcon from "@mui/icons-material/Menu";
import DashboardIcon from "@mui/icons-material/Dashboard";
import {User} from "../../context/AuthContext";
import UserMenu from "../menu/UserMenu";

const drawerWidth = 240;

const AccountLayout: React.FC = () => {
    const {user} = useOutletContext<{ user: User }>();
    const navigate = useNavigate();

    const [mobileOpen, setMobileOpen] = useState(false);

    const [pages] = useState([
        {route: "/" + user.group?.slug, title: "Voltar", icon: <DashboardIcon/>, back: true},
        {route: "/", title: "Minha conta", icon: <DashboardIcon/>},
        {route: "/profile", title: "Perfil", icon: <DashboardIcon/>},
        {route: "/password", title: "Segurança", icon: <DashboardIcon/>},
    ]);

    const handleDrawerToggle = () => setMobileOpen(!mobileOpen);


    /** Sidebar (Drawer) */
    const drawer = (
        <Box>
            <Toolbar>
                <Typography
                    variant="h6"
                    noWrap
                    sx={{
                        fontFamily: "monospace",
                        fontWeight: 700,
                        letterSpacing: ".2rem",
                        color: "inherit",
                        textDecoration: "none",
                    }}
                >
                    MINHA CONTA
                </Typography>
            </Toolbar>
            <Divider/>
            <List>
                {pages.map((page, index) => (
                    <ListItemButton key={index} component="a" onClick={() => {
                        navigate(page?.back ? page.route : "/account" + page.route)
                    }}>
                        <ListItemIcon>{page.icon}</ListItemIcon>
                        <ListItemText primary={page.title}/>
                    </ListItemButton>
                ))}
            </List>
        </Box>
    );

    return (
        <Box sx={{display: "flex"}}>
            <CssBaseline/>

            {/* Navbar */}
            <AppBar
                position="fixed"
                sx={{
                    width: {sm: `calc(100% - ${drawerWidth}px)`},
                    ml: {sm: `${drawerWidth}px`},
                }}
            >
                <Toolbar>
                    {/* Botão menu mobile */}
                    <IconButton
                        color="inherit"
                        edge="start"
                        onClick={handleDrawerToggle}
                        sx={{mr: 2, display: {sm: "none"}}}
                    >
                        <MenuIcon/>
                    </IconButton>

                    {/* Título à esquerda */}
                    <Typography variant="h6" noWrap component="div">
                        {"Oi! " + user.name}
                    </Typography>

                    {/* Empurra avatar para a direita */}
                    <Box sx={{flexGrow: 1}}/>

                    {/* Avatar + menu usuário */}
                    <UserMenu user={user}/>
                </Toolbar>
            </AppBar>

            {/* Sidebar */}
            <Box
                component="nav"
                sx={{width: {sm: drawerWidth}, flexShrink: {sm: 0}}}
            >
                {/* Mobile */}
                <Drawer
                    variant="temporary"
                    open={mobileOpen}
                    onClose={handleDrawerToggle}
                    ModalProps={{keepMounted: true}}
                    sx={{
                        display: {xs: "block", sm: "none"},
                        "& .MuiDrawer-paper": {
                            boxSizing: "border-box",
                            width: drawerWidth,
                        },
                    }}
                >
                    {drawer}
                </Drawer>

                {/* Desktop */}
                <Drawer
                    variant="permanent"
                    sx={{
                        display: {xs: "none", sm: "block"},
                        "& .MuiDrawer-paper": {
                            boxSizing: "border-box",
                            width: drawerWidth,
                        },
                    }}
                    open
                >
                    {drawer}
                </Drawer>
            </Box>

            {/* Conteúdo principal */}
            <Box
                component="main"
                sx={{
                    flexGrow: 1,
                    p: 3,
                    width: {sm: `calc(100% - ${drawerWidth}px)`},
                }}
            >
                {/* Espaço para navbar */}
                <Toolbar/>
                <Outlet context={{user}}/>
            </Box>
        </Box>
    );
};

export default AccountLayout;
