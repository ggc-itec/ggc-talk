<?php

  class Post_category extends Eloquent 
  {
    public $timestamps = false;
    
	protected $table = 'posts_category';
	
    public function topics()
    {
        return $this->belongsToMany('Post_topic');
    }
  }