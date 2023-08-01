<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Purchase.php


class Purchase extends Model
{
    // Define the table associated with the model (if different from the default)
    protected $table = 'purchases';

    // Define the relationship with the User model (each purchase belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Ticket model (each purchase belongs to a ticket)
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}

