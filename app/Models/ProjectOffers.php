<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectOffers extends Model
{
    protected $table = 't_projectoffers';
    protected $primaryKey = 'penawaran_id';
    public $timestamps = true;

    protected $fillable = [
        'project_id',
        'user_id',
        'penawaran_harga',
        'penawaran_deskripsi',
        'Tanggal_penawaran',
    ];

}
