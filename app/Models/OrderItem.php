<?php

namespace App\Models;
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
            "amount" => "required",
            "fullValue" => "required",
        ]);
    }

    public function getAmount(): int
    {
        return $this->attributes['amount'];
    }

    public function setAmount(int $amount) : void
    {
        $this->attributes['amount'] = $amount;
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
