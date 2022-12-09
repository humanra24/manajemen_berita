<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['kategori_id', 'kategori'];
    public $incrementing = false;
    protected $primaryKey = 'kategori_id';

    protected $casts = [
        'kategori_id' => 'string'
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

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
