<?php

namespace App\Models;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use app\Models\OrderItem;
use app\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Order extends Model
{
    // use HasFactory;

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - unique number for a event
     * $this->attributes['dateDelivery'] - string - contains the date of delivery
     * $this->attributes['receipt'] - string - contains the recipt of the product
     */

    protected $fillable = [];

    public function orderItem(): OrderItem
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function getOrderItem(): OrderItem
    {
        return $this->orderItem;
    }

    public function user(): User
    {
        return $this->hasOne(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
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

    public function setId(): void
    {
        $this->attributes['id'] = $id;
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
