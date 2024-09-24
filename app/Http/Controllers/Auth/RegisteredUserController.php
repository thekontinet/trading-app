<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register', [
            'accountTypes' => collect($this->getAccountTypes())->map(fn($val, $key) => [
                'name' => $val,
                'id' => $key,
            ]),
            'countries' => $this->getCountries(),
            'currencies' =>  collect(config('money.supported_currencies'))->map(fn($val, $key) => [
                'name' => $val,
                'id' => $key,
            ]),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'account_type' => ['required', Rule::in(array_keys($this->getAccountTypes()))],
            'country' => ['required', Rule::in(config('countries'))],
            'currency' => ['required', Rule::in(array_keys(config('money.supported_currencies')))],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'agree' => ['required', 'accepted'],
        ]);

        $user = User::create([
            'country' => $request->country,
            'currency' => $request->currency,
            'account_type' => $request->account_type,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    private function getAccountTypes(){
        return [
                'live' => 'Live',
                'demo' => 'Demo',
            ];
    }

    private function getCountries()
    {
        return Cache::rememberForever('countries-xyz', fn() => collect(config('countries')))->map(fn($val, $key) => [
            'name' => $val,
            'id' => $val,
        ]);
    }
}
