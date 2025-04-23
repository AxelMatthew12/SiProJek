<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 't_projects';
    protected $primaryKey = 'project_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'kategori_id',
        'judul_project',
        'deskripsi',
        'bujed_min',
        'bujed_max',
        'tanggal_posting',
        'deadline',
        'status',
        'created_at',
        'updated_at'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'kategori_id');
    }
}
