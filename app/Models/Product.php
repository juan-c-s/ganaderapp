<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['price'] - int - contains the product price
    */

    protected $fillable = ['title','price','image','description','rating','category','supplier'];

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
        return $this->attributes['name'];
    }

    public function setTitle($name) : void
    {
        $this->attributes['name'] = $name;
    }

    public function getImage(): string
    {
        return $this->attributes['name'];
    }

    public function setImage($name) : void
    {
        $this->attributes['name'] = $name;
    }

    public function getCategory(): string
    {
        return $this->attributes['name'];
    }

    public function setCategory($name) : void
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice($price) : int
    {
        $this->attributes['price'] = $price;
    }

    public function getSupplier(): string
    {
        return $this->attributes['name'];
    }

    public function setSupplier($name) : void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['name'];
    }

    public function setDescription($name) : void
    {
        $this->attributes['name'] = $name;
    }

    public function getRating(): int
    {
        return $this->attributes['name'];
    }

    public function setRating($name) : void
    {
        $this->attributes['name'] = $name;
    }
}
