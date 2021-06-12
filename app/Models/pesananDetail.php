<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    public function alatmusik()
	{
	      return $this->belongsTo(AlatMusik::class);
	}

	public function pesanan()
	{
	      return $this->belongsTo('App\Pesanan','pesanan_id', 'id');
	}
}
