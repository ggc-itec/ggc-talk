<?php
// Add this line
use LaravelBook\Ardent\Ardent;

class Post extends Ardent {
	protected $guarded = array();

	/**
     * Table
     */
    protected $table = 'posts';
 
    public static $rules = array(
        'title' => 'required|min:7',              
        'message' => 'required|min:10'	
    );

    protected $fillable = array('title','message');
}
