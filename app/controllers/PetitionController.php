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
	
	public function handleCreatePetition()
	{
		$petition = new Petition();
		$petition -> class_name = Input::get('class_name');
		$petition -> class_desc = Input::get('class_desc');
		$petition -> subject = Input::get('subject');
		$petition -> save();
		return Redirect::to('petitions');
	}
	
	/**
	 * This should only be called by an Admin
	 */
	// public function handleDeletePetition(Petition $petition)
	// {
		// $petition->delete();
		// return Redirect::to('petitions');
	// }
	
	public function showPetition(Petition $petition)
	{
		var_dump($petition);
		// return View::make('petition.show_petition', compact('petition'));
	}
}
