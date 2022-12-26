<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function createToken(){
        $user = Auth::user();
        if(Auth::check() && $user->is_admin === 1){//
            return auth()
                ->user()
                ->createToken('auth_token', ['admin'])
                ->plainTextToken;
        }
        return redirect('login');
    }

    public function clearTokens(){
        if(Auth::check() && Auth::user()->is_admin === 1) {
            Auth::user()->tokens()->delete();
        }
        return 'Token Cleared';
    }
}
