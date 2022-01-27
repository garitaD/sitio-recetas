<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Evento que se ejecuta cunado un suaurio es creado
    protected static function boot(){
        parent::boot();

        //Asignar perfil una vez se haya creado un nuevo usuario
        static::created(function($user){
            $user->perfil()->create(); //crea el perfil una vez se crea  un nuevo usuario
        });
    }

    //Relacion de 1:n de Usuario a Recetas (un usuario puede tener multiples recetas)
    public function recetas(){
        
        return $this->hasMany(Receta::class);
    }

    //Relacion 1:1 (un usuario va a tener un pefil)
    public function perfil(){

        return $this->hasOne(Perfil::class);
    }

    //Recetas que el usuario le ha dado me gusta
    public function meGusta(){
        //likes_receta es la table pivote
        return $this->belongsToMany(Receta::class, 'likes_receta');

    }
}
