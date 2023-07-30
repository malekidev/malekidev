<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\UserVerifyCodeSend;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function Code(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Code::class);
    }
    public function sendVerify(): void
    {
        if (! $this->isUserVerified()){
            $this->Code()->delete();
            $code = rand(10000,99999);
            $this->Code()->create([
                'code' => $code
            ]);
            $this->notify(new UserVerifyCodeSend($code));
        }
    }
    public function verify(){
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp()
        ])->save();
    }
    public function isUserVerified(): bool
    {
        return $this->phone_verified_at !== null;
    }
}
