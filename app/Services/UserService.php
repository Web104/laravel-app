<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService {
    
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {

        $this->userRepository = $userRepository;
    }

    /**
     * Logique de création :
     */

    public function createUser(array $data) {

        return $this->userRepository->create($data);
    }
}