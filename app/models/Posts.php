<?php
use LaravelBook\Ardent\Ardent;
class Posts extends Ardent {
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
		return $this->belongsTo('Posts_topic');
	}
}
