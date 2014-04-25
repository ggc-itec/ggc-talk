<?php

  class Posts_category extends Eloquent 
  {
    public $timestamps = false;
    
	 protected $table = 'posts_category';
    protected $fillable = array('title','description');
	
    public function topics()
    {
        return $this->belongsToMany('Posts_topic');
    }
  }