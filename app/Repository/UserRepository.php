<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    private User $repository;

    public function __construct(User $repository)
    {
        $this->repository = $repository;
    }

    public function createNewUser(array $data): User
    {
        return $this->repository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
    }

    public function findUser(string $email): User
    {
        return $this->repository->where('email', $email)->firstOrFail();
    }
}