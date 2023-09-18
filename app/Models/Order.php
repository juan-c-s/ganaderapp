<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Event extends Model
{
    // use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - unique number for a event
     * $this->attributes['orderItems'] - string - items that belong to each order
     * $this->attributes['user'] - string - contains the owner's username
     * $this->attributes['dateDelivery'] - string
     * $this->attributes['receipt'] - string
     */

    protected $fillable = [];

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class, 'events'); // Relación uno a muchos (un evento tiene muchos pedidos)
    }

    public function user()
    {
        return $this->hasOne(User::class, 'users'); // Relación uno a muchos (un evento tiene muchos pedidos)
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            "orderItems" => "required|string",
            "user" => "required|string",
            "dateDelivery" => "required|date",
            "receipt" => "required|string",
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getOrderItems(): string
    {
        return $this->attributes['orderItems'];
    }

    public function setOrderitems($orderItems): void
    {
        $this->attributes['orderItems'] = $orderItems;
    }

    public function getUsers(): string
    {
        return $this->attributes['users'];
    }

    public function setUser($user): void
    {
        $this->attributes['user'] = $user;
    }

    public function getDateDelivery(): string
    {
        return $this->attributes['dateDelivery'];
    }

    public function setDatedelivery($dateDelivery): void
    {
        $this->attributes['dateDelivery'] = $dateDelivery;
    }

    public function getReceipt(): string
    {
        return $this->attributes['receipt'];
    }

    public function setReceipt($receipt): void
    {
        $this->attributes['receipt'] = $receipt;
    }
}
