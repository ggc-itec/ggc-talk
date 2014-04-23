<?php

  class Housing_pic extends Eloquent 
  {
    public $timestamps = false;
    
    public function listings()
    {
        return $this->belongsTo('Housing_listing');
    }
  }