<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Services\UserService;

/**
 * Class AuthController
 *
 * Controller for managing Auth operations.
 */
class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display the login form.
     *
     * @return View
     */
    public function loginView()
    {
        return view('login');
    }

    /**
     * Display the registration form.
     *
     * @return View
     */
    public function registerView()
    {
        return view('register');
    }

    /**
     * Store user data in session and redirect to login page.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function registerRedirect(Request $request)
    {
        // Store 'user' in session
        $request->session()->put('user');

        return redirect('/login');
    }

    /**
     * Store user data in session and redirect to welcome page.
     *
     * @param  Request  $request
     * @return View
     */
    public function loginRedirect(Request $request)
    {
        // Store 'user' in session
        $request->session()->put('user');

        return view('welcome');
    }

    /**
     * Validate and register a new user.
     *
     * @param  RegisterRequest  $request
     * @return RedirectResponse
     */
    public function registerUser(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $result = $this->userService->createUser($validatedData);

        if ($result) {
            return back()->with('success', 'You have Registered Successfully');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    /**
     * Validate and log in a user.
     *
     * @param  LoginRequest  $request
     * @return userService
     */
    public function loginUser(LoginRequest $request)
    {
        // Call UserService to handle user login
        return $this->userService->loginUser($request);
    }
}
