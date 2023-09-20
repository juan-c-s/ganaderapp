<?php

namespace App\Models;
// SIMON
// DONOVAN

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use app\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    // use HasFactory;

    /**
     * EVENT ATTRIBUTES
     * $this->attributes['id'] - int - unique number for a event
     * $this->attributes['title'] - string - contains the name of the event
     * $this->attributes['category'] - string - contains the category of the event
     * $this->attributes['date'] - date - contains date of the event
     * $this->attributes['description'] - string - contains a event description
     * $this->attributes['image'] - string - contains a base64 encoded image
     * $this->attributes['location'] - string - contains the physical location
     */
    protected $fillable = ['title', 'category', 'maxCapacity', 'date', 'description', 'image', 'location'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'maxCapacity' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'required',
            'location' => 'required',
        ]);
    }

    public static function createEvent(Request $request): void
    {
        $newEvent = new Event();
        $newEvent->setTitle($request->title);
        $newEvent->setCategory($request->category);
        $newEvent->setMaxCapacity($request->maxCapacity);
        $newEvent->setDate($request->date);
        $newEvent->setDescription($request->description);
        $newEvent->setImage($request->image);
        $newEvent->setLocation($request->location);
        $newEvent->setUserId($request->user_id);
        $newEvent->save();
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
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

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image): void
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

    public function getMaxCapacity(): int
    {
        return $this->attributes['maxCapacity'];
    }

    public function setMaxCapacity(int $maxCapacity): void
    {
        $this->attributes['maxCapacity'] = $maxCapacity;
    }
}
