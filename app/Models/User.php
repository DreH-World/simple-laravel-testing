<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function PHPUnit\Framework\exactly;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * lowercase username
     * @param array $options
     * @return bool
     */
    public function save(array $options = [])
    {
        if (isset($options['username']))
            $options['username'] = strtolower($options['username']);
        return parent::save($options); // TODO: Change the autogenerated stub
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $attributes
     * @return static
     */
    public static function create(array $options = [])
    {
        if (isset($options['username']))
            $options['username'] = strtolower($options['username']);
        $model = new User($options);
        $model->save();
        return $model;
    }
}