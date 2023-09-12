<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Review extends Model
{
    use HasFactory;

    /**
     * ORDERITEM ATTRIBUTES
     * $this->attributes['amount'] - int - contains the amount of the order
     * $this->attributes['fullValue'] - int - contains the product name
     * $this->attributes['dateOfPurchase'] - string - contains the date of the purchase of the product
    */ 

    protected $fillable = ['amount','fullValue','dateOfPurchase'];



    public static function validate(Request $request):void{
        $request->validate([
            "amount" => "required",
            "fullValue" => "required",
            "dateOfPurchase" => "required",
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

    public function getDateOfPurchase(): string
    {
        return $this->attributes['dateOfPurchase'];
    }

    public function setDateOfPurchase(string $dateOfPurchase) : void
    {
        $this->attributes['dateOfPurchase'] = $dateOfPurchase;
    }
}
