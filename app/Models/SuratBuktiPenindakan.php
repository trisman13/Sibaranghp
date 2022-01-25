<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SuratBuktiPenindakan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surat_bukti_penindakan';
}
