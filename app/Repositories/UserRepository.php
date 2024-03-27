<?php

namespace App\Repositories;
 
use App\Abstracts\BaseRepository;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Symfony\Component\Mime\Encoder\Base64Encoder;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getAllUsers()
    {
        return $this->getAll()  ;
    }

    public function getUserById(User $user)
    {
        return $user;
    }

    public function createUser(array $attributes)
    {
        return $this->create($attributes);
    }

    public function updateUser(User $user, array $attributes)
    {
        // dd($user);

        return $this->updateData($user,$attributes);
    }

    public function deleteUser(User $user)
    {
        return $this->deleteData($user);
    }
}
