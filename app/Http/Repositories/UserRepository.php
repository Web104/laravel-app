<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository {
    /**
     * Crée un nouvel utilisateur en base de données. 
     */
    public function create(array $data) {
        return User::create($data);
    }

    /**
     * Récupère la liste des utilisateurs (sera utile pour le GET)
     */
    

    // Version simplifiée
    public function getAll(array $filters = []) {
        // On commence par créer la requ^te de base
        $query = User::query();

        // Si un filtre "name" est fourni, on ajoute la condition
        if(isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        // On retourne les résultats paginés par &à
        return $query->paginate(10);
    }

    // Version plus compacte
    // public function getAll(array $filters = []) {
    //     // La pagination est imposé par le sujet 
    //     return User::query()
    //     ->when(isset($filters['name']), fn($q) => $q->where('name', 'like', "%{$filters['name']}%"))
    //     ->paginate(10);
    // }
}