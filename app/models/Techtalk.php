<?php

  class Techtalk extends Eloquent
  {
    public $timestamps = true;
    
    public function comments()
    {
        return $this->hasMany('Tech_comment');
    }
  }
