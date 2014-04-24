<?php

  class Post_topic extends Eloquent 
  {
    public $timestamps = false;
    
	protected $table = 'posts_topic';
	
    public function category()
    {
        return $this->belongsTo('Post_category');
    }

    public function posts()
    {
        return $this->hasMany('Posts');
    }
    
  }