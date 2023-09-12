<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - unique number for a event
     * $this->attributes['orderItems'] - string - items that belong to each order
     * $this->attributes['user'] - string - contains the owner's username
     * $this->attributes['dateDelivery'] - string
     * $this->attributes['receipt'] - string
     */

    protected $fillable = [];

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
