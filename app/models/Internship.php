<?php
  
    class Internship extends Eloquent
    {
      
      public $timestamps = false;

      public static $rules = array(
        'companyName' => 'required',
        'position' => 'required',
        'started' => 'required',
        'compensation' => 'required',
        'hrPerWeek' => 'required',
        'comments' => 'required',
        'creatorID' => 'required',
        'challenge' => 'required',
        'networking' => 'required',
        'social' => 'required',
        'importance' => 'required',
        'experience' => 'required'
        
      );
      
    }
