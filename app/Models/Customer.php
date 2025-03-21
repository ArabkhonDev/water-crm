<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable, HasFactory;

    protected $fillable = [
        "name",
        'phone',
        'address'
    ] ;

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
