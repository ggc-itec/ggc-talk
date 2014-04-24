<?php

  class Post_topic extends Eloquent 
  {
    public $timestamps = false;
    
  	protected $table = 'Post_topic';
  	
    protected $fillable = array('title');

    public function category()
    {
        return $this->belongsTo('Post_category');
    }

    public function posts()
    {
        return $this->hasMany('Posts');
    }
    
  }