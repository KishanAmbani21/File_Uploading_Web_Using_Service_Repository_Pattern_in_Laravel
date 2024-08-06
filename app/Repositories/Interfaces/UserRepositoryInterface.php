<?php

namespace App\Repositories\Interfaces;

/**
 *
 * Interface for the User Repository.
 */
interface UserRepositoryInterface {

    /**
     * Create a new user.
     *
     * @param array $data
     */
    public function create(array $data);

    /**
     * Find a user by their email address.
     *
     * @param string $email
     */
    public function findByEmail(string $email);

    /**
     * Get a user by their ID.
     *
     * @param int $id
     */
    public function getUser($id);
}
