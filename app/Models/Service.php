<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'name',
        'description',
        'price',
        'category',
        'image1',
        'image2',
        'image3',
        'image4',
        'preferred_colors',
        'executives',
        'portfolio_link',
        'social_media_links',
        'history',
        'achievements',
        'email',
        'provider_name',
        'business_name',
        'phone',
        'street_address',
        'google_maps_link',
        'operating_hours',
        'customer_categories',
    ];

    /**
     * Get the first available image for the service.
     */
    public function getPrimaryImageAttribute()
    {
        return $this->image1 ?: $this->image2 ?: $this->image3 ?: $this->image4;
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    /**
     * Get all reviews for this service.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get only approved reviews.
     */
    public function approvedReviews()
    {
        return $this->hasMany(Review::class)->where('status', 'approved');
    }

    /**
     * Calculate average rating.
     */
    public function getAverageRatingAttribute()
    {
        return $this->approvedReviews()->avg('rating') ?? 0;
    }

    /**
     * Get total reviews count.
     */
    public function getTotalReviewsAttribute()
    {
        return $this->approvedReviews()->count();
    }

    /**
     * Get rating breakdown (count of each rating).
     */
    public function getRatingBreakdownAttribute()
    {
        return $this->approvedReviews()
            ->selectRaw('rating, COUNT(*) as count')
            ->groupBy('rating')
            ->orderBy('rating', 'desc')
            ->pluck('count', 'rating')
            ->toArray();
    }
}

