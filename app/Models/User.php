<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primarykey = 'id';
    protected $table = 'user'; // Specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = ['name', 'email', 'password', 'role'];
}
