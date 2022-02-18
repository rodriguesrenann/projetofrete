<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private UserRepository $repository;
    private AuthService $authService;
    public function __construct(UserRepository $repository, AuthService $authService)
    {
        $this->repository = $repository;
        $this->authService = $authService;
    }

    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = $this->repository->createNewUser($request->all());

        $this->authService->login($user);

        return redirect()->route('home');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        if (!$this->authService->attempt($request->all())) {
            return back()->withErrors('Usuário e/ou senha incorretos');
        };

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);

        return redirect('/');
    }
}
