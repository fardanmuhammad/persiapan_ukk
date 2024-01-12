<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    use HasFactory;

    protected $table = 'penggunas';

    protected $fillable = [ 'username', 'password', 'email',];

    protected $hidden = ['password',];
}
