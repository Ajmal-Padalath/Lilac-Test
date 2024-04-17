<?php

namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(Request $request) {
        $users = Users::select('user.name as user_name', 'department.name as department', 'designation.name as designation')
                        ->join('department','department.id','user.fk_department')
                        ->join('designation','designation.id','user.fk_designation')
                        ->get();
        return view('list-users', compact('users'));
    }
}
