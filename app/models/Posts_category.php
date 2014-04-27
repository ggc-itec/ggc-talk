<?php

  class Posts_category extends Eloquent 
  {
    public $timestamps = false;
    
	 protected $table = 'posts_category';
    protected $fillable = array('title','description');
	
    public function topics()
    {
        return $this->hasMany('Posts_topic', 'category_id');
    }

    public function TopTopics()
    {

      $topics = $this->topics();

      return $topics->where('created_at','<=', time())->take(5)->get();
    }
  }