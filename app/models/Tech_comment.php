<?php

  class Tech_comment extends Eloquent
  {
    public $timestamps = true;
    
    public function comment()
    {
        return $this->belongsTo('Techtalk');
    }
  }
