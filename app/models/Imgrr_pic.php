<?php

  class Imgrr_pic extends Eloquent 
  {
    public $timestamps = false;
    
    public function comments()
    {
        return $this->hasMany('Imgrr_comment');
    }
  }
