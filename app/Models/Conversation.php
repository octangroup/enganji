<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    protected $fillable=['affiliate_id','user_id'];

    public function messages(){
        return $this->hasMany(Message::class,'conversation_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function affiliate(){
        return $this->belongsTo(Affiliate::class,'affiliate_id');
    }


}
