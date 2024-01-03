<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date','quatity','price']; 


    public function calculateTotal()
    {
        // Assuming you have a 'quantity' and 'price' column in your database
        return $this->quantity * $this->price;
    }

}
