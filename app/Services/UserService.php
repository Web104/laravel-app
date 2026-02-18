<?php
namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService {
    
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * Logique de création : On s'occupe du hashage du mot de passe ici.
     */

    public function createUser(array $data) {
        // Le hachage est obligatoire selon les spécifications
        $data['password'] = Hash::make($data['password']);

        return $this->userRepository->create($data);
    }
}