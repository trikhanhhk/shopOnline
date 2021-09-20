<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = 'bill_details';
    protected $fillable = ['id','bill_id','product_id','quantity','unit_price'];
    public function product() {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function bill() {
        return $this->belongsTo('App\Models\BillDetail', 'bill_id', 'id');
    }
}
