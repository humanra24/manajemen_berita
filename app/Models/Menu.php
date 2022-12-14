<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $guarded = 'menu_id';
    public $incrementing = false;
    protected $primaryKey = 'menu_id';
}
