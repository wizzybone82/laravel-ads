<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use HasFactory;
    
    protected $primaryKey = 'c_id';
    protected $fillable = [
        'comment_msg',
        'comment_user_id',
        'comment_ad_id',
        'comment_by',
    ];



    public function user(){
        return $this->hasOne(User::class,'id','comment_user_id');
    }
}
