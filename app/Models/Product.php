<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
     * $this->attributes['quantity'] - int - contains the product price
     * $this->attributes['location'] - string - contains the location of the product
     * this->attributes['created_at'] - string - contains the date of creation of the product
     * this->attributes['updated_at'] - string - contains the date of update of the product
    */

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'location'
    ];

    // GETERS
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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    // SETERS
    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    function setLocation(string $location): void
    {
        $this->attributes['location'] = $location;
    }

    // RELATIONS
    public function reviews() // falta el type
    {
        return $this->hasMany(Review::class);
    }

    //  CLASS METHODS
    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price'=> 'required',
            'quantity' => 'required',
            'location' => 'required'
        ]);
    }
}