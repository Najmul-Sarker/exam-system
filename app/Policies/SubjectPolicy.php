<?php

namespace App\Policies;

use App\Models\User;

class SubjectPolicy
{
    /**
     * Create a new policy instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    public function create(User $user){
        if($user->isAdmin()){
            return true;
        }
    }
    
    public function show(User $user){
        if($user->isAdmin()){
            return true;
        }
    }
    
    public function edit(User $user){
        if($user->isAdmin()){
            return true;
        }
    }
    

   
}
