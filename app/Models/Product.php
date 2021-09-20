<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    public function brand(){
        return $this->belongsTo('App\Models\Brand', 'id', 'name');
    }

    public function type_product() {
        return $this->belongsTo('App\Models\TypeProduct', 'type_id', 'id');
    }

    public function bill_detail() {
        return $this->hasMany('App\Models\BillDetail', 'product_id', 'id');
    }
    public function brandName(){
        $name = Brand::where('id',$this->brand_id)->value('name');

        return $name;
    }
    public function brandLogo(){
        $logo = Brand::where('id',$this->brand_id)->value('logo');
        return $logo;
    }

}
