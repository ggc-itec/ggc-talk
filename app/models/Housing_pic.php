<?php

class Housing_pic extends BaseModel {
	public $timestamps = false;
	
	protected $fillable = array('filename');
	
	protected static $rules = array(
		'pic1' => array('image'),
		'pic2' => array('image'),
		'pic3' => array('image'),
		'pic4' => array('image')
	);
	
	protected static $messages = array('image' => '*invalid file type');

	public function listing() {
		return $this -> belongsTo('Housing_listing');
	}

}
