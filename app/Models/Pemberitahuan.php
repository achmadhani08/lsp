<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemberitahuan extends Model
{
    use HasFactory;

    protected $fillable = ['isi', 'level_user', 'buku_id', 'kategori_id', 'status'];

    public function buku()
    {
        return  $this->belongsTo(Buku::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
