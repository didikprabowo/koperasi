<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable =['jenis','user_id','nominal','bulan'];
    function user(){
        return $this->belongsTo('App\User');
    }
}
