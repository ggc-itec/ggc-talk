<?php

class Post extends Eloquent {
	protected $guarded = array();

	/**
     * Table
     */
    protected $table = 'posts';
 
    public static $rules = array(
        'title' => 'required|min:5',              
        'message' => 'required|min:10'	
    );

    protected $fillable = array('title','message');
	
	public function topic()
	{
		return $this->belongsTo('Post_topic');
	}

   
}
