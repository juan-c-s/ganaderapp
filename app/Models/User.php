<?php

namespace App\Models;

// JUANCAMILO
// SIMON
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use app\Models\Event;
use app\Models\Order;
use app\Models\Review;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the username
     * $this->attributes['password'] - string - contains the password of the user
     * $this->attributes['address'] - string - contains the addres of the user
     * $this->attributes['wallet'] - int - contains currency of the user
     * $this->attributes['role'] - string - contains the role of the user (OwnerEvent - Participant)
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
        'role',
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

    public static function deleteById(Request $request): void
    {
        $user = User::findOrFail($request->id);
        $user->delete();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function setProducts(Collection $products): void
    {
        $this->products = $products;
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function getEvent(): Event
    {
        return $this->event;
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

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
    
    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
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

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }
}
