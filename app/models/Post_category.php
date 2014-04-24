<?php

  class Post_category extends Eloquent 
  {
    public $timestamps = false;
    
	 protected $table = 'post_category';
    protected $fillable = array('title','description');
	
    public function topics()
    {
        return $this->belongsToMany('Post_topic');
    }
  }