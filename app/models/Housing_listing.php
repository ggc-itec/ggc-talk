<?php

  class Housing_listing extends Eloquent 
  {
    public function image()
    {
        return $this->hasMany('Housing_pic');
    }
  }