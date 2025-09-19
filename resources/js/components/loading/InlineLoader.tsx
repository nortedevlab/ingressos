import React from "react";
import { Box, CircularProgress } from "@mui/material";

interface InlineLoaderProps {
    size?: number;
    message?: string;
}

// Modo de uso: <InlineLoader message="Carregando dados..." />
const InlineLoader: React.FC<InlineLoaderProps> = ({ size = 24, message }) => {
    return (
        <Box
            sx={{
                display: "flex",
                alignItems: "center",
                justifyContent: "center",
                gap: 1,
                p: 2,
            }}
        >
            <CircularProgress size={size} />
            {message && <span>{message}</span>}
        </Box>
    );
};

export default InlineLoader;
