<?php
  
    class Location extends Eloquent
    {
      
      public $timestamps = false;

      public static $rules = array(
        'name' => 'required'
      );
      
    }
