<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostService {

    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Add a new post.
     *
     * @param array $postData
     * @param int $userId
     * @return RedirectResponse
     */
    public function addPost($postData, $userId)
    {
        // Prepare data for the new post
        $data = [
            'title' => $postData['title'],
            'description' => $postData['description'],
            'user_id' => $userId,
        ];

        // Handle file upload if image is present
        if (isset($postData['image']) && !empty($postData['image'])) {
            $image = $postData['image'];
            $extension = $image->getClientOriginalExtension();

            // Determine directory based on file type
            if (in_array($extension, ['jpeg', 'jpg', 'png'])) {
                $directory = 'Images';
            } elseif (in_array($extension, ['pdf'])) {
                $directory = 'PDFs';
            } elseif (in_array($extension, ['doc', 'docx', 'txt'])) {
                $directory = 'DOCs';
            } else {
                return redirect()->back()->with('error', 'Invalid file type.');
            }

            // Move the file to the appropriate directory
            $imageName = time() . '.' . $extension;
            $image->move($directory, $imageName);
            $data['image'] = $imageName;
        }

        // Attempt to save the post using the repository
        try {
            $this->postRepository->savePost($data);
            return redirect()->back()->with('success', 'Post added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save post. Please try again later.');
        }
    }

    /**
     * Retrieve all posts.
     *
     * @return Collection
     */
    public function viewAllPost()
    {
        return $this->postRepository->viewAllPost();
    }

    /**
     * Delete a post by ID.
     *
     * @param int $id
     * @return int
     */
    public function deletePost($id)
    {
        return $this->postRepository->deletePost($id);
    }
}

