<?php
namespace App\Http\Controllers\Api;

use \App\Http\Controllers\Controller;
use \App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse; 
use Illuminate\Http\Response;

class UserController extends Controller {
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * POST/API/users - Création d'utilisateur
     */

    public function store(StoreUserRequest $request): JsonResponse {
        try {
            $user = $this->userService->createUser($request->validated());
            return response()->json([
                "sucess" => true,
                "message" => "Operation successful",
                "data" => $user
            ], Response::HTTP_CREATED); // Code 201 Succès
        } catch (\Exception $e) {
            return response()->json([
                "sucess" => false,
                "message" => "Internal server error",       
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // coe (500) Erreur serveur
        }
    }
} 