<?php

class PetitionController extends BaseController
{
	public function showPetitions()
	{
		return View::make('petition.petitions');
	}
	
	public function showCreatePetition()
	{
		return View::make('petition.create_petition');
	}
}
