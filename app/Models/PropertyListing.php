<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyListing extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyListingFactory> */
    use HasFactory,
        HasSlug,
        SoftDeletes;

    protected $guarded = [];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    // Relation 
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function propertyFeature()
    {
        return $this->belongsTo(PropertyFeature::class, 'featured_id');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function Images()
    {
        return $this->hasMany(PropertyImage::class, 'property_listing_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
