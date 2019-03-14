<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

	protected $guarded = [];
    
    protected $with = ['channel', 'user'];

    protected static function boot(){
        parent::boot();

        static::addGlobalScope('replyCount', function($builder) {
            $builder->withCount('replies');
        });
    }


    public function path(){
    	return '/threads/'. $this->channel->name . '/' .$this->id ;
    }


    public function replies(){
    	return $this->hasMany('App\Reply');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function addReply($reply){
    	$this->replies()->create($reply);
    }

    public function channel(){
        return $this->belongsTo('App\Channel');
    }

    public function scopeFilter($query, $filters){
        return $filters->apply($query);
    }


}
