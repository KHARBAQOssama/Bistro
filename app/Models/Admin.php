<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable As Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    use HasFactory;
    // protected $username;
    // protected $email;
    // protected $password;
    protected $fillable = [
        'username',
        'email',
        'password'
    ];

    public function getAuthIdentifierName()
    {
        return 'e';
    }

    public function getAuthIdentifier()
    {
        return $this->email;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
