<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['date'] - date - contains the date of the order
     * $this->attributes['address'] - string - contains the address for the order delivery
     * $this->attributes['courier'] - string - contains the name or identifier of the courier
     * $this->attributes['total'] - integer - contains the total amount of the order
     * $this->attributes['trackingNumber'] - string|null - contains the tracking number for the order (can be null)
     * $this->attributes['status'] - string - contains the status of the order (e.g., "shipped", "delivered")
     * $this->attributes['user_id'] - unsignedBigInteger - contains the foreign key referencing the user who made the order
     * $this->attributes['created_at'] - string - contains the date of creation of the order
     * $this->attributes['updated_at'] - string - contains the date of update of the order
     */
    protected $fillable = [
        'date',
        'address',
        'courier',
        'total',
        'trackingNumber',
        'status',
        'user_id',
    ];

    //GETTERS
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getDate(): string
    {
        return $this->attributes['date'];
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function getCourier(): string
    {
        return $this->attributes['courier'];
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function getTrackingNumber(): string
    {
        return $this->attributes['trackingNumber'];
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
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
    public function setDate(string $date): void
    {
        $this->attributes['date'] = $date;
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function setCourier(string $courier): void
    {
        $this->attributes['courier'] = $courier;
    }

    public function setTotal(int $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function setTrackingNumber(string $trackingNumber): void
    {
        $this->attributes['trackingNumber'] = $trackingNumber;
    }

    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }

    public function setUserId(int $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    //RELATIONS
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
