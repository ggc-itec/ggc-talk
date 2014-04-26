<?php

class Housing_listing extends BaseModel {
	
	protected $fillable = array('author', 'title', 'body', 'rent', 'distance', 'type', 'bedrooms', 'city');
	
	protected static $rules = array(
		'title' => 'required',
		'body' => 'required',
		'rent' => array('required','regex:/^\d+(\.\d*)?$|^0?\.\d+$/'),
		'type' => 'required',
		'bedrooms' => 'required',
		'city' => 'required'
	);
	
	public function validate() {
		parent::validate();
		
		$messages = array(
			'required' => '*requiired',
			'integer' => 'no , or .',
			'regex' => '*invalid format'
		);
		
		$validation = Validator::make($this->getAttributes(), static::$rules, $messages);
		
		if ($validation->fails()) {
			$this->errors = $validation->messages();
			return false;	
		}
		
		return true;
	}
	
	public function image() {
		return $this -> hasMany('Housing_pic');
	}

}
