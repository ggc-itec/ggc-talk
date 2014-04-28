<?php

class Housing_listing extends BaseModel {
	
	protected $fillable = array('author', 'title', 'body', 'rent', 'distance', 'type', 'bedrooms', 'city');
	
	protected static $rules = array(
		'title' => 'required',
		'body' => 'required',
		'rent' => array('required','regex:/^\d+(\.\d*)?$|^0?\.\d+$/'),
		'type' => 'required',
		'bedrooms' => 'required',
		'city' => 'required',
		'pic' => 'image'
	);
	
	protected static $messages = array(
			'required' => '*requiired',
			'regex' => '*invalid format',
			'image' => '*invalid file'
	);
	
	public function images() {
		return $this -> hasMany('Housing_pic');
	}

}
