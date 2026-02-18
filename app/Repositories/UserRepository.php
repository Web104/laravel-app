<?php

// Gère l'accès aux données

namespace App\Repositories;

use App\Models\User;

class UserRepository {
    
    public function create(array $data) {
        return User::create($data);
    }

    public function getAll(array $filters = []) {
        $query = User::query();

        if(isset($filters['name'])) {
            $query->where('name', 'ilike', '%' . $filters['name'] . '%'); 
        }

        return $query->paginate(10);
    }
}