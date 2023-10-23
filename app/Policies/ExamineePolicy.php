<?php

namespace App\Policies;

use App\Models\User;

class ExamineePolicy
{
    /**
     * Create a new policy instance.
     */
    public function create(User $user){
        if($user->isExaminee()){
            return true;
        }
    }
    
    public function show(User $user){
        if($user->isExaminee()){
            return true;
        }
    }
    
    public function edit(User $user){
        if($user->isExaminee()){
            return true;
        }
    }
}
