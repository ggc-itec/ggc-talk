<?php

  class Post_topic extends ardent 
  {
    public $timestamps = false;
    
    public function category()
    {
        return $this->belongsTo('Post_category');
    }

    public function posts()
    {
        return $this->hasMany('Posts');
    }
    
  }