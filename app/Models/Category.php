<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'm_category';
    protected $primaryKey = 'kategori_id';
    public $timestamps = false;

    protected $fillable = [
        'kategori_kode',
        'kategori_nama'
    ];
    // Model Category.php
public function projects()
{
    return $this->hasMany(Project::class, 'kategori_id', 'kategori_id');
}

}
