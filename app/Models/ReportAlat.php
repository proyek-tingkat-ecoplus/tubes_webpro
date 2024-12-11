<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportAlat extends Model
{
    protected $table = 'report_alats';

    protected $fillable = [
        'alat_id',
        'user_id',
        'desripsi',
        'binwas',
        'tahun_operasi',
        'latitude',
        'longitude',
        'address',
        'photo',
        'status',
        'tanggal',
        'rejected_at',
        'approved_at',
        'approved_by',
        'rejected_by',
        'rejected_reason_id',
        'approved_reason_id',
        'status',
    ];

    public function approved_by(){
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    public function rejected_by(){
        return $this->belongsTo(User::class, 'rejected_by', 'id');
    }

    public function alat(){
        return $this->belongsTo(Alat::class,'alat_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    // public function report_alat(){
    //     return $this->belongsToMany(ReportAlat::class,'report_alat','alat_id','id');
    // }
}
