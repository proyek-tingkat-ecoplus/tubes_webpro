<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KantorDinas extends Model
{
    protected $table = 'kantor_dinas';
    protected $fillable = [
        'nama',
        'bio',
        'alamat',
        'kode_pos',
        'no_telp',
        'email',
        'website',
        'tanggal_jam_buka',
        'tanggal_jam_tutup'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
