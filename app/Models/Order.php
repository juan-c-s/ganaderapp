<?php

namespace App\Models;

//<!-- {/*SIMON*/} -->
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use app\Models\OrderItem;
use app\Models\User;
use app\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    // use HasFactory;

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - unique number for a event
     * $this->attributes['total'] - int - contains the date of delivery
     * $this->attributes['products'] - string - contains the recipt of the product
     */
    protected $fillable = [];

    public function user(): User
    {
        return $this->hasOne(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'user' => 'required|string',
            'total' => 'required|integer',
            'products' => 'required|array',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(): void
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal(): string
    {
        return $this->attributes['total'];
    }

    public function setTotal($total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getProducts(): array
    {
        return $this->attributes['products'];
    }

    public function setProducts($products): void
    {
        $this->attributes['products'] = $products;
    }
}
