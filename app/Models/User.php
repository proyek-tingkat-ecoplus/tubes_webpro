<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use  HasFactory, Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'photo',
        'username',
        'email',
        'password',
        'role_id',
        'token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(){
        return $this->belongsTo(Role::class, "role_id");
    }

    public function user_details(){
        return $this->hasOne(UserDetails::class, 'user_id','id');
    }

    public function proposals(){
        $this->hasMany(Proposal::class, 'user_id', 'id');
    }

    public function forums(){
        $this->hasMany(Forum::class, 'user_id', 'id');
    }

    public function comments(){
        $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function alat(){
        $this->hasMany(Alat::class, 'user_id', 'id');
    }

    public function reportAlat(){
        $this->belongsToMany(Alat::class, 'report_alat', 'user_id', 'alat_id',)
        ->withPivot('judul_report', 'deskripsi', 'latidude','longitude','address','status', 'tanggal', 'rejected_at', 'approved_at', 'approved_by', 'rejected_by', 'approved_reason', 'rejected_reason');
    }

    public function kantor_dinas(){
        return $this->belongsTo(KantorDinas::class, 'kantor_dinas_id', 'id');
    }





}
