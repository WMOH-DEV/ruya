<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ModController extends Controller
{
    //
    public function index()
    {
        $mods = User::where('role_id', '3')->paginate(20);

        return view('cp.moderators.index', compact('mods'));
    }
}
