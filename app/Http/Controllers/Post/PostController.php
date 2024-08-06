<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Services\PostService;

/**
 * Class PostController
 *
 * Controller for managing Post operations.
 */
class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('welcome');
    }

    /**
     * Display the add post form.
     *
     * @return View
     */
    public function uploadpost()
    {
        return view('addpost');
    }

    /**
     * Handle the request to add a new post.
     *
     * @param  PostRequest  $request
     * @return PostService
     */
    public function addPost(PostRequest $request)
    {
        // Retrieve user ID from session
        $userId = $request->session()->get('loginId');

        // Check if user ID is available in session
        if (!$userId) {
            return redirect()->route('login')->with('fail', 'You must be logged in to add a post.');
        }

        // Validate request data
        $data = $request->validated();

        return $this->postService->addPost($data, $userId);
    }

    /**
     * Display all posts.
     *
     * @return View
     */
    public function viewPosts()
    {
        $posts = $this->postService->viewAllPost();

        return view('viewpost', compact('posts'));
    }

    /**
     * Display files view with posts data.
     *
     * @param  Request  $request
     * @return View
     */
    public function files(Request $request)
    {
        // Retrieve current segment from request
        $segment = $request->segment(1);

        $posts = $this->postService->viewAllPost();

        return view('files', compact('posts', 'segment'));
    }

    /**
     * Delete a post by ID.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function deletePost($id)
    {
        $this->postService->deletePost($id);

        return redirect()->back();
    }
}

