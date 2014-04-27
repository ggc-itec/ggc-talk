<?php

class Posts_topic extends Eloquent 
{
  public $timestamps = true;

  protected $table = 'posts_topic';


  protected $fillable = array('title', 'description');

  public function category()
  {
    return $this->belongsTo('Posts_category');
  }

  public function posts()
  {
    return $this->hasMany('Posts');
  }
  public function getCreatedDate()
  {
    $date = $this->created_at;

    return date("mm-dd-yyyy ", strtotime($date));
  }



}