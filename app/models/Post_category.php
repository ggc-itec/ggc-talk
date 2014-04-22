<?php

  class Post_category extends Eloquent 
  {
    public $timestamps = false;
    
    public function topics()
    {
        return $this->belongsToMany('Post_topic');
    }
  }