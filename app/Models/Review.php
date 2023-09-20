<?php

namespace App\Models;
// JUANCAMILO
// SIMON
use app\Models\Product;
use app\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['comment'] - string - contains the comment of the user about the product
     * $this->attributes['rating'] - int - contains the rating that the user put on the product
     * $this->attributes['created_at'] - string - contains the created_at timestamp
     * $this->attributes['updated_at'] - string - contains the updated_at timestamp
     * ***#*** Agregar created_at y updated_at
    */ 

    protected $fillable = ['comment','rating'];

    public static function createReview(Request $request):void
    {
        $newReview = new Review();
        $newReview->setComment($request->comment);
        $newReview->setRating($request->rating);
        $newReview->setProductId($request->product_id);
        $newReview->save();
    }
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public static function validate(Request $request):void{
        $request->validate([
            "comment" => "required",
            "rating" => "required|numeric|gt:0|lte:5",
            "product_id" => "required|exists:products,id",
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id) : void
    {
        $this->attributes['id'] = $id;
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function setProductId(int $productId): void
    {
        $this->attributes['product_id'] = $productId;
    }


    public function getComment(): string
    {
        return $this->attributes['comment'];
    }

    public function setComment(string $comment ) : void
    {
        $this->attributes['comment'] = $comment;
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating(string $rating ) : void
    {
        $this->attributes['rating'] = $rating;
    }

}
