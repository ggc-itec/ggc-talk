<?php

class Housing_listing extends BaseModel {
	
	protected $fillable = array('author', 'title', 'body', 'rent', 'distance', 'type', 'bedrooms', 'city');
	
	protected static $rules = array(
		'title' => 'required',
		'body' => 'required',
		'rent' => array('required', 'regex:/((([1-9]{1,2}\d?(\,\d{3}){1,})|([1-9]\d*))(\.\d{0,2})?)|0?\.\d{1,2}/'),
		'type' => 'required',
		'bedrooms' => 'required',
		'city' => 'required'
	);
	
	public function image() {
		return $this -> hasMany('Housing_pic');
	}

}
