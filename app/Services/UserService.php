<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService {

    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    /**
     * Authenticate a user based on login credentials.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function loginUser(LoginRequest $request)
    {
        $user = $this->userRepository->findByEmail($request->email);

        if ($user) {

            if ($user->password == $request->password) {
                // Store the user's ID in the session
                $request->session()->put('loginId', $user->id);
                return redirect('/')->with('success', 'Login successfully');
            } else {
                return back()->with('fail', 'Password Does Not Match');
            }
        } else {
            return back()->with('fail', 'This Email is Not Registered');
        }
    }

    /**
     * Get a user by their ID.
     *
     * @param int $id
     * @return User
     */
    public function getUser($id)
    {
        // Retrieve user by ID using the UserRepository
        return $this->userRepository->getUser($id);
    }
}

