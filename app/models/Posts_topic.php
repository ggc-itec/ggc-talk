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

  
   public function posts($OrderBycolumn)
    {
        if($OrderBycolumn == 'created_at')
        {
          return $this->hasMany('Posts', 'topic_id')->orderBy('created_at', 'desc')->get();
        }

        return $this->hasMany('Posts', 'topic_id');
    }

    


  public function getCreatedDate()
  {
    $date = $this->created_at;

    return date("mm-dd-yyyy ", strtotime($date));
  }
}