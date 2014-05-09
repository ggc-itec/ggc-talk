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
		$petition -> subject = "";//FIX ME Later
		if(!$petition->validate(Input::all()))
		{
			return Redirect::back()->withInput()->withErrors(array_merge($petition->getErrors()->toArray()));
		}else 
		{
			$petition -> save();
			return Redirect::to('petitions')->with(array('alert' => 'Don\'t forget to sign your own petition', 'alert-class' => 'alert-success'));
		}
		
	}
	
	public function handleSignPetition()
	{
		$userID = Input::get('user_id');
		$petitionID = Input::get('petition_id');
		$query = DB::table('signees')->where('petition_id', '=', $petitionID)->get();
		$signed = -1;
		foreach($query as $q)
		{
			if($q->user_id == $userID)
			{
				$signed = 0;
			}
		}
		
		if($signed == -1)
		{
			$signee = new Signee();
			$signee -> user_id = $userID;
			$signee -> petition_id = $petitionID;
			$signee -> save();
			return Redirect::to('petitions');
		}
		else {
			return Redirect::to('petitions')->with(array('alert' => 'You have already signed this petition', 'alert-class' => 'alert-danger'));
		}
		return var_dump($signed);
	}
	
	/**
	 * This should only be called by an Admin
	 */
	public function handleDeletePetition(Petition $petition)
	{
		$petition->delete();
		return Redirect::to('petitions');
	}
	
	public function showPetition(Petition $petition)
	{
		return View::make('petition.show_petition', compact('petition'));
	}
}
