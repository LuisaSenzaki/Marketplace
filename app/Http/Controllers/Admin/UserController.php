<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pendingUsers = User::where('is_approved', 0)->get();
        $approvedUsers = User::where('is_approved', 1)->get();

        return view('admin.users.index', compact('pendingUsers', 'approvedUsers'));
    }

    public function approve(User $user)
    {
        $user->update(['is_approved' => 1]);

        // Opcional: Notificar o usuário por e-mail sobre a aprovação.
        // Mail::to($user->email)->send(new UserApproved());

        return redirect()->route('admin.users.index')->with('success', 'Usuário aprovado com sucesso!');
    }
}