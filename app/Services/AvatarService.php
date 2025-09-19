<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class AvatarService
{
    /**
     * Salva avatar em múltiplos tamanhos
     *
     * @param UploadedFile $file
     * @param int $userId
     * @return array
     */
    public function store(UploadedFile $file, int $userId): array
    {
        $folder = "avatars/{$userId}";
        $filename = uniqid('avatar_') . '.' . $file->getClientOriginalExtension();

        // Define tamanhos
        $sizes = [
            'thumb' => [100, 100],
            'medium' => [300, 300],
            'large' => [600, 600],
        ];

        $paths = [];

        foreach ($sizes as $key => [$width, $height]) {
            $resized = Image::read($file)
                ->resize($width, $height)
                ->encode();
            $path = "{$folder}/{$key}_{$filename}";
            Storage::disk('public')->put($path, $resized);
            $paths[$key] = $path;
        }

        return $paths;
    }

    /**
     * Remove avatares antigos de um usuário
     *
     * @param int $userId
     * @return void
     */
    public function clear(int $userId): void
    {
        Storage::disk('public')->deleteDirectory("avatars/{$userId}");
    }
}
