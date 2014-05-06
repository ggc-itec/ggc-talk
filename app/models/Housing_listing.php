<?php

class Housing_listing extends BaseModel {
	
	protected $fillable = array('author', 'title', 'body', 'rent', 'distance', 'type', 'bedrooms', 'city', 'alternateEmail', 'contactPhone', 'displayAuthor_Email');
	
	protected static $rules = array(
		'title' => 'required',
		'body' => 'required',
		'rent' => array('required','regex:/^\d+(\.\d*)?$|^0?\.\d+$/'),
		'type' => 'required',
		'bedrooms' => 'required',
		'city' => 'required',
		'contactPhone' => 'regex:/\d{3}-\d{3}-\d{4}$/',
		'alternateEmail' => 'email',
		'pic' => 'image'
	);
	
	protected static $messages = array(
			'required' => '*requiired',
			'regex' => '*invalid format',
			'image' => '*invalid file',
			'email' => '*invalid format'
	);
	
	public function images() {
		return $this -> hasMany('Housing_pic');
	}

}
