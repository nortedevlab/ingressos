import React, {useState} from "react";
import {useNavigate} from "react-router-dom";
import {
    Avatar,
    Box,
    IconButton,
    ListItemIcon,
    ListItemText,
    Menu,
    MenuItem,
    Tooltip,
} from "@mui/material";
import AccountCircleIcon from "@mui/icons-material/AccountCircle";
import Logout from "@mui/icons-material/Logout";
import {useAuth, User} from "../../context/AuthContext";

interface UserMenuProps {
    user: User;
}

const UserMenu: React.FC<UserMenuProps> = ({user}) => {
    const {logout} = useAuth();
    const navigate = useNavigate();
    const [anchorElUser, setAnchorElUser] = useState<null | HTMLElement>(null);

    const handleOpenUserMenu = (event: React.MouseEvent<HTMLElement>) =>
        setAnchorElUser(event.currentTarget);
    const handleCloseUserMenu = () => setAnchorElUser(null);

    const userMenuTo = (route: string) => () => {
        navigate(route);
    };

    const [settings] = useState([
        {route: "/account", title: "Perfil", icon: <AccountCircleIcon/>},
        {route: null, title: "Sair", icon: <Logout/>, onclick: logout},
    ]);

    return (
        <Box sx={{flexGrow: 0}}>
            <Tooltip title={user?.name ?? "Usuário"}>
                <IconButton onClick={handleOpenUserMenu} sx={{p: 0}}>
                    <Avatar
                        alt={user?.name ?? "Usuário"}
                        src={user?.avatar ? `/storage/${user.avatar}` : "/static/images/avatar/placeholder.png"}
                    />
                </IconButton>
            </Tooltip>
            <Menu
                sx={{mt: "45px"}}
                id="menu-appbar"
                anchorEl={anchorElUser}
                anchorOrigin={{
                    vertical: "top",
                    horizontal: "right",
                }}
                keepMounted
                transformOrigin={{
                    vertical: "top",
                    horizontal: "right",
                }}
                open={Boolean(anchorElUser)}
                onClose={handleCloseUserMenu}
            >
                {settings.map((setting, index) => (
                    <MenuItem key={index} onClick={handleCloseUserMenu}>
                        {setting.icon ? <ListItemIcon>{setting.icon}</ListItemIcon> : null}
                        <ListItemText
                            sx={{textAlign: "center", ml: setting.icon ? 1 : 0}}
                            onClick={
                                setting.route
                                    ? userMenuTo(setting.route)
                                    : setting.onclick
                            }
                        >
                            {setting.title}
                        </ListItemText>
                    </MenuItem>
                ))}
            </Menu>
        </Box>
    );
};

export default UserMenu;
