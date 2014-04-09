<?php

  class Imgrr_comment extends Eloquent 
  {
    public $timestamps = false;
    
    public function image()
    {
        return $this->belongsTo('Imgrr_pic');
    }
  }
