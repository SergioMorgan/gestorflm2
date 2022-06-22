<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    public function index () {
        // $users = User::orderBy('created_at', 'desc')->paginate(5);
        // return view('users.index',['users' => $users]);
        return view('users.index');
    }

    // public function create () {
    //     return view('users.create');
    // }

    // public function store (StoreUser $request) {
    //     $user = User::create($request->all());
    //     return redirect()->route('users.show', $user);
    // }

    // public function show (User $user) {
    //     return view('users.show', ['user' => $user]);
    // }

    // public function edit(User $user) {
    //     return view('users.edit', ['user' => $user]);
    // }

    // public function update(StoreUser $request, User $user) {
    //     $user->update($request->all());
    //     return redirect()->route('users.show', $user);
    // }

    // public function destroy(User $user){
    //     $user->delete();
    //     return redirect()->route('users.index', $user);
    // }
}
