<?php

  class Posts_category extends Eloquent 
  {
    public $timestamps = true;
    
	 protected $table = 'posts_category';
    protected $fillable = array('title','description');
	
    public function topics($OrderBycolumn)
    {
        if($OrderBycolumn == 'created_at')
        {
          return $this->hasMany('Posts_topic', 'category_id')->orderBy('created_at', 'desc')->get();
        }

        return $this->hasMany('Posts_topic', 'category_id');
    }

    public function TopTopics()
    {

      $topics = $this->topics();

      return $topics->where('created_at','<=', time())->take(5)->get();
    }
  }