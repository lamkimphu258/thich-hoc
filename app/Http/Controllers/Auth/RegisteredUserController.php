<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Trainee;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $result = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Trainee::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Trainee::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $trainee = Trainee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($trainee));

        Auth::login($trainee);

        return redirect(RouteServiceProvider::HOME);
    }
}
