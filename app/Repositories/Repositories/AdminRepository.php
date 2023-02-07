<?php

namespace App\Repositories\Repositories;

use App\Models\{User, Role};
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\DatabaseNotification;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Classes\GeneratePass;

class AdminRepository implements AdminRepositoryInterface {

	private $model;

    // Users
	public function getAllUsers()
	{
        return User::with(['roles'])->get(); 
	}

	public function createUser($request)
	{
        $gp = new GeneratePass;
        $pass = $gp->randomPassword();
        $role_user = Role::where('id', $request['role'])->first();

        $user = User::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => Hash::make($pass),
        ]);
        $user->roles()->attach($role_user);
        return $user;
	}

    public function getUser($id)
    {
        return User::with(['roles'])->findOrFail($id);
    }

	public function updateUser($request, $id)
	{
        $role_user = Role::where('id', $request->role)->first();
		$user = User::findOrFail($id);
		$user->name = $request->name;
		$user->surname = $request->surname;

        if(Auth::id() != $id) {
            $user->roles()->sync($role_user);
        }
        $user->save();
	}

	public function deleteUser($id)
	{
        $user = User::findOrFail($id); 
        $user->roles()->detach();
        $user->delete();
	}

    public function getRoles()
    {
        return Role::all(); 
    }
}
