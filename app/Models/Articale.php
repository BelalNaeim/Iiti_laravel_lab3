<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articale extends Model {
    use HasFactory;
    protected $table = 'articales';

    protected $fillable = [ 'title', 'content', 'image','pu_date', 'user_id' ];
}
