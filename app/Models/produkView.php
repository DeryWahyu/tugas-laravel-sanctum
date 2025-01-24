<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukView extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'harga', 'kategori_id'];

    public function kategoriView()
    {
        return $this->belongsTo(KategoriView::class, 'kategori_id');
    }
}
