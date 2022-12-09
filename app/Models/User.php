<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $fillable = ['user_id', 'username', 'password'];
    public $incrementing = false;
    protected $primaryKey = 'user_id';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'user_id' => 'string'
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('H:m:s d-m-Y');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])
            ->translatedFormat('H:m:s d-m-Y');
    }
}
