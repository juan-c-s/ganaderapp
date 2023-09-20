<?php

namespace App\Models;
//<!-- {/*SIMON*/} -->

use app\Models\Product;
use app\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class OrderItem extends Model
{
    use HasFactory;

    /**
     * ORDERITEM ATTRIBUTES
     * $this->attributes['quantity'] - int - contains the number of products that the user want to buy
     * $this->attributes['fullValue'] - int - contains the total amount of the purchase
     * $this->attributes['created_at'] - string - contains the created_at timestamp
     * $this->attributes['updated_at'] - string - contains the updated_at timestamp
    */ 

    protected $fillable = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public static function validate(Request $request):void{
        $request->validate([
            "quantity" => "required",
            "fullValue" => "required",
        ]);
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity) : void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getFullValue(): int
    {
        return $this->attributes['fullValue'];
    }

    public function setFullValue(int $fullValue ) : void
    {
        $this->attributes['fullValue'] = $fullValue;
    }
}
