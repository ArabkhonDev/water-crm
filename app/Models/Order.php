<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable, HasFactory;

    protected $fillable = ["customer_id", 'quantity', 'price', 'is_paid'] ;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
