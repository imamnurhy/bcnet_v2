<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tmpelanggan extends Model
{
protected $fillable=['n_pelanggan','no_hp','tgl_daftar','tmlayanan_id'];

public function tmLayanan(){
    return $this->belongsTo(Tmlayanan::class, 'tmlayanan_id');
}

}
