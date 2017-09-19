<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unique', 'role', 'active', 'first_name', 'last_name', 'email', 'password', 'postal', 'address1', 'address2', 'zip',
        'town', 'county', 'country', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'unique';
    }

    /**
     * @param $email
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public static function byEmail($email)
    {
        return static::where('email', $email)->firstOrFail();
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
     */
    public function setFirstNameAttribute($name)
    {
        $this -> attributes['first_name'] = ucfirst($name);
    }

    /**
     * @param $name
     */
    public function setLastNameAttribute($name)
    {
        $this -> attributes['last_name'] = ucfirst($name);
    }

    /**
     * @param $town
     */
    public function setTownAttribute($town)
    {
        $this -> attributes['town'] = ucfirst($town);
    }

    /**
     * @param $county
     */
    public function setCountyAttribute($county)
    {
        $this -> attributes['county'] = ucfirst($county);
    }

    /**
     * @param $country
     */
    public function setCountryAttribute($country)
    {
        $this -> attributes['country'] = ucfirst($country);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return ucfirst($this->first_name);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return ucfirst($this->last_name);
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return ucwords("{$this->first_name} {$this->last_name}");
    }

    /**
     * @return null|string
     */
    public function getLocation()
    {
        if ($this->town && $this->county && $this->country):
            return "From {$this->town} in {$this->county}, {$this->country}";
        elseif ($this->town && $this->country):
            return ucwords("{$this->town}, {$this->country}");
        endif;

        return null;
    }

    /**
     * @return null|string
     */
    public function getAddress()
    {
        if ($this->zip && $this->address1 && $this->address2):
            return "{$this->zip} - {$this->address1} or {$this->address2}";
        elseif ($this->address1):
            return ucwords("{$this->zip} - {$this->address1}");
        endif;

        return null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activationToken()
    {
        return $this->hasOne(ActivationToken::class);
    }

    /**
     * @return bool
     */
    public function hasToken()
    {
        return (bool) $this->activationToken;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createToken()
    {
        return $this->activationToken()->create(['token' => Str::random(128)]);
    }

    /**
     * @return mixed
     */
    public function deleteToken()
    {
        return $this->activationToken()->delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
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
}
