<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $guarded = 'berita_id';
    public $incrementing = false;
    protected $primaryKey = "berita_id";
}
