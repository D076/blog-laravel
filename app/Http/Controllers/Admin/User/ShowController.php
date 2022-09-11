<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $roles = User::getRoles();
        $role = null;
        foreach ($roles as $id => $role_name){
            if ($user->role == $id){
                $role = $role_name;
            }
        }
        return view('admin.user.show', compact('user', 'role'));
    }
}
