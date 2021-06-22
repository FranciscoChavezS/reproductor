<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function autorizar(User $user)
    {
        //Creamos una validación en caso de que el usuario creo el post pueda acceder a él
        if($user->id == Auth::user()->id){
            return true;
        }else{
            return false;
        }
    }
    
}
