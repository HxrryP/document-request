<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupationalPermit extends Model
{
    use HasFactory;

    // Example: In app/Models/Permit.php
public function user()
{
    return $this->belongsTo(User::class);
}
}

