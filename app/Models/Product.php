<?php

namespace App\Models;
//<!-- {/*JUANCAMILO*/} -->
//<!-- {/*SIMON*/} -->
use App\Models\OrderItem;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['title'] - string - contains the product name
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['image'] - int - contains the product price
     * $this->attributes['description'] - int - contains the product price
     * $this->attributes['category'] - int - contains the product price
     * $this->attributes['supplier'] - int - contains the product price
     * ***#*** Agregar created_at y updated_at
     */ 
    
    protected $fillable = ['title','price','image','description','rating','category','supplier'];
    
    public static function validate(Request $request):void
    {
        $request->validate([
            "title" => "required",
            "price" => "required|numeric|gt:0",
            "image" => "required",
            "description" => "required",
            "rating" => "required|numeric|gt:0",
            "category" => "required",
            "supplier" => "required",
            "user_id" => "required|exists:users,id",
        ]);
    }

    public static function createProduct(Request $request):void
    {
        $newProduct = new Product();
        $newProduct->setTitle($request->title);
        $newProduct->setPrice($request->price);
        $newProduct->setImage($request->image);
        $newProduct->setDescription($request->description);
        $newProduct->setRating($request->rating);
        $newProduct->setCategory($request->category);
        $newProduct->setSupplier($request->supplier);
        $newProduct->setUserId($request->user_id);
        $newProduct->save();
    }

    public static function updateProduct(Request $request):void
    {
        $product = Product::find($request->id);
        $product->setTitle($request->title);
        $product->setPrice($request->price);
        $product->setDescription($request->description);
        $product->setRating($request->rating);
        $product->setCategory($request->category);
        $product->setSupplier($request->supplier);
        $product->save();
    }

    public static function deleteById(Request $request):void
    {
        $product = Product::findOrFail($request->id);
        $product->reviews()->delete();
        $product->delete();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser(int $user):void
    {
        $this->user = $user;
    }
    
    public function getUserId():int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId):void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getOrderItems(): OrderItem
    {
        return $this->product;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews():Collection
    {
        return $this->reviews;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id) : void
    {
        $this->attributes['id'] = $id;
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle($title) : void
    {
        $this->attributes['title'] = $title;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image) : void
    {
        $this->attributes['image'] = $image;
    }

    public function getCategory(): string
    {
        return $this->attributes['category'];
    }

    public function setCategory($category) : void
    {
        $this->attributes['category'] = $category;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice($price) : void
    {
        $this->attributes['price'] = $price;
    }

    public function getSupplier(): string
    {
        return $this->attributes['supplier'];
    }

    public function setSupplier(string $supplier) : void
    {
        $this->attributes['supplier'] = $supplier;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description) : void
    {
        $this->attributes['description'] = $description;
    }

    public function getRating(): string
    {
        return $this->attributes['rating'];
    }

    public function setRating(string $rating) : void
    {
        $this->attributes['rating'] = $rating;
    }

}
