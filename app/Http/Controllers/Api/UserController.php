<?php

namespace App\Http\Controllers\Api;

// import nécessaire au bon fonctionnement du controleur
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
     * POST/API/users - Création d'utilisateur, avec gestion d'erreur.
     */

    public function store(StoreUserRequest $request): JsonResponse {
        try {
            $user = $this->userService->createUser($request->validated());
            return response()->json([
                "success" => true,
                "message" => "Operation successful",
                "data" => $user
            ], Response::HTTP_CREATED); // Code 201 si Succès
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Internal server error",
                "error" => $e->getMessage() // On utilise $e ici pour voir le vrai problème !
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
} 