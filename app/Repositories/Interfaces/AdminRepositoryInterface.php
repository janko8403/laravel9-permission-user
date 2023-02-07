<?php

namespace App\Repositories\Interfaces;

interface AdminRepositoryInterface {

	// Users
	public function getAllUsers();
	public function createUser(array $request);
	public function updateUser($request, $id);
    public function getUser($id);
    public function deleteUser($id);

    // Roles
    public function getRoles();
}