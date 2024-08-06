<?php

namespace App\Repositories\Interfaces;

/**
 *
 * Interface for the Post Repository.
 */
interface PostRepositoryInterface {

    /**
     * Save a new post.
     *
     * @param array $data
     */
    public function savePost($data);

    /**
     * Retrieve all posts.
     */
    public function viewAllPost();

    /**
     * Delete a post by ID.
     *
     * @param int $id
     */
    public function deletePost($id);
}

