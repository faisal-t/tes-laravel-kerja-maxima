<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['tanggal_ujian'];

    public function MataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }
}
