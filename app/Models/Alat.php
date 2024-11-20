<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $fillable = [
        'user_id',
        'kode_alat',
        'nama_alat',
        'photo',
        'jenis',
        'kondisi',
        'keterangan',
        'jumlah',
        'deskripsi_barang',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function report_alat(){
        return $this->belongsToMany(User::class,'report_alats','alat_id','user_id')->withPivot('judul_report', 'deskripsi', 'latidude','longitude','address','status', 'tanggal', 'rejected_at', 'approved_at', 'approved_by', 'rejected_by', 'approved_reason', 'rejected_reason');;
    }
}
