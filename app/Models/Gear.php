<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Gear extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'brand',
        'image',
        'quantity',
        'price',
        'category',
        'sport',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

     /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get all of the gearRequest for the Gear
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gearRequest(): HasMany
    {
        return $this->hasMany(GearRequest::class);
    }
}