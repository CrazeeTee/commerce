<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'super_name', 'parent_name', 'child_name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
    public function getSuper()
    {
        if ($this->where('super_name', $this->super_name)->firstOrFail()):
            return ucfirst($this->super_name);
        endif;

        return null;
    }
    
    public function getParent()
    {
        if ($this->where('parent_name', $this->parent_name)->firstOrFail()):
            return ucfirst($this->parent_name);
        endif;

        return null;
    }

    public function getChild()
    {
        if ($this->where('child_name', $this->child_name)->firstOrFail()):
            return ucfirst($this->child_name);
        endif;

        return null;
    }

    public static function byCategory($category)
    {
        return static::where('super_name', $category)->orWhere('parent_name', $category)->orWhere('child_name', $category)->get();
    }
}
