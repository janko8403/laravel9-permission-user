<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\AdminRepositoryInterface;

class AdminController extends Controller
{
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * Show the application users.
     *
     */
    public function users()
    {
        $users = $this->adminRepository->getAllUsers();
        // dd($users[0]->roles[0]->name);
        return view('users', compact('users'));
    }

    /**
     * Show the application add.
     *
     */
    public function add()
    {
        $roles = $this->adminRepository->getRoles();
        return view('add', compact('roles'));
    }

    /**
     * Create user.
     *
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 'surname' => 'required', 'email' => 'required|unique:users'], [
            'required' => 'Required', 'unique' => 'Take unique email']
        );

        if($request->isMethod('post'))
        {
            $this->adminRepository->createUser($request);
            return redirect('/users');
        }
    }

    /**
     * Show the application edit.
     *
     */
    public function edit($id)
    {
        $roles = $this->adminRepository->getRoles();
        $user = $this->adminRepository->getUser($id);
        return view('edit', compact('user', 'roles'));
    }

    /**
     * Update user
     *
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required', 'surname' => 'required'], [
            'required' => 'Required']
        );

        $this->adminRepository->updateUser($request, $id);
        return redirect('/users');
    }

    /**
     * Delete user
     *
     */
    public function delete($id)
    {
        $this->adminRepository->deleteUser($id);
        return redirect()->back();
    }
}
