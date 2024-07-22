<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyActivity extends Model
{
    public function subcategory(){
        return $this->hasOne(SubCategory::class,'id','activity_id');
    }
    
}
