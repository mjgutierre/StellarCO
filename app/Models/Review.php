<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['title'] - string - contains the review title
     * $this->attributes['description'] - string - contains the description of the review
     *  $this->attributes['product_id'] - string - contains the id of the product of this review
     * this->attributes['created_at'] - string - contains the date of creation of the product
     * this->attributes['updated_at'] - string - contains the date of update of the product
    */

    protected $fillable = [
        'title',
        'description',
        'product_id'
    ];

    //GETTERS
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
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
    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }
}
