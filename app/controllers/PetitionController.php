<?php

class PetitionController extends BaseController
{
	public function showAllPetitions()
	{
		$petitions = Petition::all();
		return View::make('petition.all_petitions', compact('petitions'), compact('signees'));
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
	
	public function handleSignPetition()
	{
		$signee = new Signee();
		$signee -> user_id = Input::get('user_id');
		$signee -> petition_id = Input::get('petition_id');
		$signee -> save();
		return Redirect::to('petitions');
	}
	
	/**
	 * This should only be called by an Admin
	 */
	public function handleDeletePetition($petition)
	{
		$thePetition = Petition::find($petition);
		$thePetition->delete();
		return Redirect::to('petitions');
	}
	
	public function showPetition($petition)
	{
		$thePetition = Petition::find($petition);
		$signees = Signee::where('petition_id', '=', $petition);
		return View::make('petition.show_petition', compact('thePetition'), compact('signees'));
	}
}
