<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __invoke(Request $request)
    {
        $user = User::query()->find(auth()->id());
        return view("dashboard", [
            "user" => $user,
            'assets' => Asset::query()->where('type', $request->query('type', 'crypto'))->paginate()
        ]);
    }
}
