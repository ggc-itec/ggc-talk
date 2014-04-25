<?php

  class Posts_topic extends Eloquent 
  {
    public $timestamps = false;
    
  	protected $table = 'Posts_topic';
  	
    protected $fillable = array('title');

    public function category()
    {
        return $this->belongsTo('Posts_category');
    }

    public function posts()
    {
        return $this->hasMany('Posts');
    }
    
  }