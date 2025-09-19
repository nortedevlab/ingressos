import React from "react";
import { Box, CircularProgress, Typography } from "@mui/material";

interface FullscreenLoaderProps {
    message?: string;
}

const FullscreenLoader: React.FC<FullscreenLoaderProps> = ({ message }) => {
    return (
        <Box
            sx={{
                position: "fixed",
                top: 0,
                left: 0,
                width: "100vw",
                height: "100vh",
                bgcolor: "rgba(255,255,255,0.9)",
                zIndex: 9999,
                display: "flex",
                flexDirection: "column",
                alignItems: "center",
                justifyContent: "center",
            }}
        >
            <CircularProgress size={60} />
            {message && (
                <Typography variant="h6" sx={{ mt: 2 }}>
                    {message}
                </Typography>
            )}
        </Box>
    );
};

export default FullscreenLoader;
