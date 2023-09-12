<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the username
     * $this->attributes['password'] - string - contains the password of the user
     * $this->attributes['address'] - string - contains the addres of the user
     * $this->attributes['wallet'] - int - contains currency of the user
     * $this->attributes['rol'] - string - contains the rol of the user (OwnerEvent - Participant)
     * ***#*** Agregar created_at y updated_at
    */ 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'wallet',
        'rol'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(int $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getWallet(): int
    {
        return $this->attributes['wallet'];
    }

    public function setWallet(int $wallet): void
    {
        $this->attributes['wallet'] = $wallet;
    }

    public function getRol(): string
    {
        return $this->attributes['rol'];
    }

    public function setRol(string $rol): void
    {
        $this->attributes['rol'] = $rol;
    }
}
