<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyImageFactory> */
    use HasFactory;

    protected $fillable = ['image','property_listing_id'];

    protected $casts = [
        'image' => 'array',
    ];

    public function property() {
        return $this->belongsTo(PropertyListing::class,'property_listing_id');
    }
}
