<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivationToken extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'token';
    }

    /**
     * @param $token
     * @return Model|static
     */
    public static function byToken($token)
    {
        return static::where('token', $token)->firstOrFail();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
