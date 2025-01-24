<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriView extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function produkViews()
    {
        return $this->hasMany(ProdukView::class, 'kategori_id');
    }
}
