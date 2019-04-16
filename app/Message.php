<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $fillable=['conversation_id', 'body', 'from_affiliate'];


    public function conversation(){
        return $this->belongsTo(Conversation::class,'conversation_id');
    }




}
