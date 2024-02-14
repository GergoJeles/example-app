<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeOfficeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'email', 'personalnumber',
        'supervisor_id', 'date', 'address', 'phonenumber', 'comments',
    ];

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
}
