<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'ad_id';
    protected $fillable = [
        'title',
        'description',
        'price',
        'ad_image',
        'owner_id',
        'ad_status',
        'owner_type'
    ];

    public function users()
    {
        return $this->hasOne(User::class,'id','owner_id');
    }

}

