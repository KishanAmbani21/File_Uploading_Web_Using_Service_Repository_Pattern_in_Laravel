<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

/**
 * Class UserProfileController
 *
 * Controller for managing Profile operations.
 */
class UserProfileController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display the user profile and Post Data.
     *
     * @param  Request  $request
     * @return View
     */
    public function profile(Request $request)
    {
        // Retrieve logged-in user ID from session
        $loggedInUserId = $request->session()->get('loginId');

        // Initialize arrays to store user data and posts
        $dataArray = [];
        $loggedInUserData = [];

        if ($loggedInUserId) {
            // Retrieve user data from UserService based on logged-in user ID
            $loggedInUserData = $this->userService->getUser($loggedInUserId);

            // Check if user data is available and has posts
            if (isset($loggedInUserData) && count($loggedInUserData->posts) > 0) {

                $dataArray = $loggedInUserData->posts;
            }
        }

        return view('profile', compact('dataArray', 'loggedInUserData'));
    }

    /**
     * Handle user logout.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function logout(Request $request)
    {
        // Remove 'loginId' from session to log the user out
        $request->session()->forget('loginId');

        // Redirect user to the login page with a success message
        return redirect('/login-view')->with('success', 'Logged out successfully');
    }
}
