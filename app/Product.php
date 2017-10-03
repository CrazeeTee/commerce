<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Fillable Attributes
     *
     * @var array
     */
    protected $fillable = [
        'unique', 'name', 'slug', 'image', 'description', 'size', 'color', 'price', 'old_price', 'new_price', 'availability',
        'stock', 'rating', 'hits',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'unique';
    }

    /**
     * @param $unique
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public static function byUnique($unique)
    {
        return static::where('unique', $unique)->firstOrFail();
    }

    /**
     * @param $name
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public static function byName($name)
    {
        return static::where('name', $name)->firstOrFail();
    }

    /**
     * @param $slug
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public static function bySlug($slug)
    {
        return static::where('slug', $slug)->firstOrFail();
    }
    
    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    /**
     * @param $value
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucfirst($value);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return str_limit($this->name, 20);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return str_limit($this->description, 200);
    }

    /**
     * Belongs to User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Belongs to Shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Belongs to Expert
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }

    /**
     * Belongs to Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
