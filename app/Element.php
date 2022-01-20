<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{

    protected $fillable = [

        'id', 'element_name', 'element_quantity', 'element_unit_measurement', 'element_price', 'category_id', 'user_id', 
        
    ];
}


