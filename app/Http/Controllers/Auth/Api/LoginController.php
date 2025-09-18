<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $user = Auth::user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        try {
            $user = Auth::user();

            if ($user) {
                // Revoga o token atual (se usando Sanctum com tokens)
                $user->currentAccessToken()?->delete();

                // Ou revoga todos os tokens do usuário (opcional)
                // $user->tokens()->delete();

                // Se estiver usando sessões também, invalidar a sessão
                if ($request->hasSession()) {
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                }

                // Fazer logout do guard padrão
                Auth::logout();
            }

            return response()->json([
                'message' => 'Logout realizado com sucesso'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao realizar logout',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function me(Request $request)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json(['message' => 'Não autenticado'], 401);
            }

            return response()->json([
                'user' => $user->load('group.permissions')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao obter dados do usuário',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
