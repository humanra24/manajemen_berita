<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $fillable = ['berita_id', 'judul_berita', 'kategori_id', 'isi_berita'];
    public $incrementing = false;
    protected $primaryKey = "berita_id";

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

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
