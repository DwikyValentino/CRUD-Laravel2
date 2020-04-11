<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersediaanBarang extends model
{
    protected $fillable = [
        'kodebarang', 'namabarang', 'hargapokok', 'hargajual', 'jumlah', 'nilai'
    ];
}
?>