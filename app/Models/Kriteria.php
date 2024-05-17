<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    public function wilayah() {
        return $this->belongsTo(Wilayah::class, 'kelurahan');
    }

    public function ternak() {
        return $this->belongsTo(Ternak::class);
    }
}
