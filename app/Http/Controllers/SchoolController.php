<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class SchoolController extends Controller
{
    
    public function index()
    {
        $users=User::where('role','user')->orderBy('id', 'DESC')->get();
        // return $users;
        return view('admin.school_view')->with('users',$users);
    }

// Add New School 
    public function add_School(Request $request)
    {

        
         $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            // 'mobile' => 'required|min:10',
            'mobile' => 'required',
            'password' => 'required',
            'address' => 'required',
        ]);
        // return $request;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.school')->with('success', 'School created successfully.');
        // return view('admin.school_add');
    }

}
