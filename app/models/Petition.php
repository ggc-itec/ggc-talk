<?php

class Petition extends BaseModel
{
	public $table = 'petitions';
	
	protected $fillable = array('class_name', 'class_desc', 'subject');
	
	protected static $rules = array(
		'class_name' => 'required',
		'class_desc' => 'required',
		'subject' => 'required'
	);
	
	protected static $messages = array(
			'required' => '*required'
	);
}
