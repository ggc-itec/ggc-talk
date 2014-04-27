<?php

class PetitionController extends BaseController
{
	public function showAllPetitions()
	{
		$petitions = Petition::all();
		return View::make('petition.all_petitions', compact('petitions'));
	}
	
	public function showCreatePetition()
	{
		return View::make('petition.create_petition');
	}
	
	public function showPetition()
	{
		return "This is the page for a petition";
	}
	
	public function handleCreatePetition()
	{
		$petition = new Petition();
		$petition -> class_name = Input::get('class_name');
		$petition -> class_desc = Input::get('class_desc');
		$petition -> subject = Input::get('subject');
		$petition -> save();
		return Redirect::to('petitions');
	}
}
