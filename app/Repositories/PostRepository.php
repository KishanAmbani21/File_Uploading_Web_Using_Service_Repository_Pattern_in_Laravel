<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{

    /**
     * Save a new post.
     *
     * @param array $data
     * @return Post
     */
    public function savePost($data)
    {
        // Create a new post in the database
        return Post::create($data);
    }

    /**
     * Retrieve all posts.
     *
     * @return Collection
     */
    public function viewAllPost()
    {
        // Retrieve all posts from the database
        return Post::all();
    }

    /**
     * Delete a post by ID.
     *
     * @param int $id
     * @return int
     */
    public function deletePost($id)
    {
        // Delete the post from the database by its ID
        return Post::destroy($id);
    }
}
