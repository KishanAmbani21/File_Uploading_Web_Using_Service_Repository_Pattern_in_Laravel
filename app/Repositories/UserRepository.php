<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    protected $model;

    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        // Create a new user in the database
        return User::create($data);
    }

    /**
     * Find a user by their email address.
     *
     * @param string $email
     * @return User
     */
    public function findByEmail(string $email)
    {
        // Retrieve a user by their email address
        return User::where('email', '=', $email)->first();
    }

    /**
     * Get a user by their ID, including their posts.
     *
     * @param int $userId
     * @return User Model user id
     */
    public function getUser($userId)
    {
        // Retrieve a user by their ID along with their associated posts
        return User::with('posts')->find($userId);
    }
}
