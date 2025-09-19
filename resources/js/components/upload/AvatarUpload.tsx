import React, {useState, useCallback} from "react";
import {useDropzone} from "react-dropzone";
import Cropper from "react-easy-crop";
import {Box, Button, Typography} from "@mui/material";

interface AvatarUploadProps {
    onFileSelected: (file: File | null) => void;
}

const AvatarUpload: React.FC<AvatarUploadProps> = ({onFileSelected}) => {
    const [image, setImage] = useState<string | null>(null);
    const [crop, setCrop] = useState({x: 0, y: 0});
    const [zoom, setZoom] = useState(1);

    const onDrop = useCallback((acceptedFiles: File[]) => {
        if (acceptedFiles.length > 0) {
            const file = acceptedFiles[0];
            setImage(URL.createObjectURL(file));
            onFileSelected(file);
        }
    }, [onFileSelected]);

    const {getRootProps, getInputProps, isDragActive} = useDropzone({
        accept: {"image/*": []},
        onDrop,
    });

    return (
        <Box sx={{my: 2}}>
            <Box {...getRootProps()} sx={{
                border: "2px dashed #ccc",
                p: 3,
                textAlign: "center",
                cursor: "pointer",
            }}>
                <input {...getInputProps()} />
                {isDragActive ? (
                    <Typography>Solte a imagem aqui...</Typography>
                ) : (
                    <Typography>Arraste uma imagem ou clique para selecionar</Typography>
                )}
            </Box>

            {image && (
                <Box sx={{position: "relative", width: "100%", height: 200, mt: 2}}>
                    <Cropper
                        image={image}
                        crop={crop}
                        zoom={zoom}
                        aspect={1}
                        onCropChange={setCrop}
                        onZoomChange={setZoom}
                    />
                </Box>
            )}

            {image && (
                <Button variant="outlined" sx={{mt: 2}} onClick={() => setImage(null)}>
                    Remover
                </Button>
            )}
        </Box>
    );
};

export default AvatarUpload;
