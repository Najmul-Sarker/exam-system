<?php

namespace App\Policies;

use App\Models\User;

class QuestionBankPolicy
{
    /**
     * Create a new policy instance.
     */
    public function create(User $user){
        if($user->isEditor()||$user->isAdmin()){
            return true;
        }
    }
    
    public function show(User $user){
        if($user->isEditor()||$user->isAdmin()){
            return true;
        }
    }
    
    public function edit(User $user){
        if($user->isEditor()||$user->isAdmin()){
            return true;
        }
    }

}
