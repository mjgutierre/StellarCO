<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Order;
use App\Models\Product;

class Item extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['price'] - string - contains the price of the item
     * $this->attributes['prompt'] - string - contains the propmt used by the LLM
     * $this->attributes['order_id'] - int - contains the referenced order id
      * $this->attributes['product_id'] - int - contains the referenced product id
     * this->attributes['created_at'] - string - contains the date of creation of the product
     * this->attributes['updated_at'] - string - contains the date of update of the product
     * $this->order - Order - contains the associated Order
     * $this->product - Product - contains the associated Product
    */
    protected $fillable = [
        'price',
        'prompt',
        'product_id',
    ];

    //GETTERS
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getPrice(): string
    {
        return $this->attributes['price'];
    }

    public function getPrompt(): string
    {
        return $this->attributes['prompt'];
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    //SETTERS
    public function setPrice(string $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function setPrompt(string $prompt): void
    {
        $this->attributes['prompt'] = $prompt;
    }

    public function setProductId(int $product_id): void
    {
        $this->attributes['product_id'] = $product_id;
    }

    //METHODS
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
