<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Expert extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unique', 'role', 'active', 'first_name', 'last_name', 'email', 'password', 'postal', 'address1', 'address2', 'zip',
        'town', 'county', 'country', 'additional'
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
     * Set the Route model binder
     *
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activationToken()
    {
        return $this->hasOne(ActivationToken::class);
    }

    /**
     * @return mixed
     */
    public function hasToken()
    {
        return $this->activationToken;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createToken()
    {
        return $this->activationToken()->create([ 'token' => str_random(128) ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * @param $value
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    /**
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @param $value
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    /**
     * @param $value
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst($value);
    }

    /**
     * @param $value
     */
    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = strtolower($value);
    }

    /**
     * @param $value
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = strtolower($value);
    }

    /**
     * @param $value
     */
    public function setTownAttribute($value)
    {
        $this->attributes['town'] = ucfirst($value);
    }

    /**
     * @param $value
     */
    public function setCountyAttribute($value)
    {
        $this->attributes['county'] = ucfirst($value);
    }

    /**
     * @param $value
     */
    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = ucfirst($value);
    }

    /**
     * @param $value
     */
    public function setAdditionalAttribute($value)
    {
        $this->attributes['additional'] = strtolower($value);
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
        return ucwords("{$this -> first_name} {$this -> last_name}");
    }
}
