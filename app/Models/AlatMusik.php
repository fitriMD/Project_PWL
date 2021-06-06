<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatMusik extends Model
{
    use HasFactory;
    protected $table = 'alat_musiks';
    public $timestamps= false;
    protected $fillable = ['name','description','image','price'];
}
