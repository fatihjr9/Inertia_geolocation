<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ternak extends Model
{
    use HasFactory;
    protected $fillable = ['kelurahan','prod_susu','prod_sapi', 'lahan', 'pemilik'];

    public function wilayah() {
        return $this->belongsTo(Wilayah::class, 'kelurahan');
    }
}
