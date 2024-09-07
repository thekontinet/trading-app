<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __invoke()
    {
        $user = User::query()->find(auth()->id());
        return view("dashboard", [
            "user" => $user,
            'assets' => Asset::query()->paginate()
        ]);
    }
}
