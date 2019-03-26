<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable, RecordsActivity;

	protected $guarded = [];

    protected $with = ['user', 'favorites'];
	
    public function user(){
    	return $this->belongsTo('App\User');
    }


    public function thread(){
    	return $this->belongsTo('App\Thread');
    }

    public function path(){
        return $this->thread->path() . "#reply-" .$this->id;
    }

}
