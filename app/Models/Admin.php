<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Table name (if not following Laravel conventions, add this)
    protected $table = 'admins';

    // Specify the columns that can be mass-assigned
    protected $fillable = [
        'nama', 'email', 'username', 'role', 'status',
    ];
}
