<?php

namespace App\Http\Controllers;

use App\Services\AvatarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function updateProfile(Request $request, AvatarService $avatarService)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            // Remove antigos
            $avatarService->clear($user->id);

            // Cria novos tamanhos
            $paths = $avatarService->store($request->file('avatar'), $user->id);

            // Armazena apenas o caminho "medium" no DB (como referência principal)
            $validated['avatar'] = $paths['medium'];
        }

        $user->update($validated);

        return response()->json([
            'message' => 'Perfil atualizado com sucesso',
            'user' => $user->load(['group', 'group.permissions']),
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return response()->json(['message' => 'Senha atual incorreta'], 422);
        }

        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return response()->json(['message' => 'Senha atualizada com sucesso']);
    }
}
