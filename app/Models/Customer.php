<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = ['id', 'name', 'email', 'address', 'phone', 'note'];

    public function bill()
    {
        return $this->hasMany('App\Models\Bill', 'customer_id', 'id');
    }
}
