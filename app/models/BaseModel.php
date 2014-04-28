<?php

/**
 * This model can be extended by any other model that requires validation.
 * 
 * Rules and custom error messages should be defined in the extending model.
 */

class BaseModel extends Eloquent {
	
	protected $errors;
	
	public function validate($input) {
		
		$validation = Validator::make($input, static::$rules, static::$messages);
		
		if ($validation->fails()) {
			$this->errors = $validation->messages();
			return false;	
		}
		
		return true;
	}
	
	public function getErrors() {
		return $this->errors;
	}
}
