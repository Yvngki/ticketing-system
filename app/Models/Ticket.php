<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_name',
        'ticket_type',
        'ticket_price',
        'ticket_quantity',
        'event_date',
        'event_location',
        // Add other fillable fields as needed
    ];
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    // Your model logic, relationships, and other methods here
}