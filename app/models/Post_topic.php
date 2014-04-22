<?php

  class Post_topic extends Eloquent 
  {
    public $timestamps = false;
    
    public function category()
    {
        return $this->belongsTo('Post_category');
    }
  }