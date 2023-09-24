<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['description'] - string - contains the description of the product
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['image'] - string - contains the product image
     * $this->attributes['quantity'] - int - contains the product price
     * $this->attributes['location'] - string - contains the location of the product
     * this->attributes['created_at'] - string - contains the date of creation of the product
     * this->attributes['updated_at'] - string - contains the date of update of the product
     * $this->reviews - Review[] - contains teh associated reviews
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'location',
    ];

    //GETERS
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function getLocation(): string
    {
        return $this->attributes['location'];
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    //SETERS
    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function setLocation(string $location): void
    {
        $this->attributes['location'] = $location;
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    }

    //RELATIONS
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    //CLASS METHODS
    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|gt:0',
            'location' => 'required|max:255',
            'image' => 'required|file|image|mimes:jpeg,png,gif',
        ]);
    }
}
