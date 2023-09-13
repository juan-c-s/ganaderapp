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
     * $this->attributes['title'] - string - contains the name of the event
     * $this->attributes['user'] - string - contains the owner's username
     * $this->attributes['category'] - string -
     * $this->attributes['date'] - string - contains date of the event
     * $this->attributes['description'] - string - contains a event description
     * $this->attributes['image'] - string - contains a base64 encoded image
     * $this->attributes['location'] - string - contains the physical location
     */

    protected $fillable = ['title', 'user', 'category', 'date', 'description', 'image', 'location'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getUser(): string
    {
        return $this->attributes['user'];
    }

    public function setUser(string $user): void
    {
        $this->attributes['user'] = $user;
    }

    public function getCategory(): string
    {
        return $this->attributes['category'];
    }

    public function setCategory(string $category): void
    {
        $this->attributes['category'] = $category;
    }

    public function getDate(): string
    {
        return $this->attributes['date'];
    }

    public function setDate(string $date): void
    {
        $this->attributes['date'] = $date;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getLocation(): string
    {
        return $this->attributes['location'];
    }

    public function setLocation(string $location): void
    {
        $this->attributes['location'] = $location;
    }
}
