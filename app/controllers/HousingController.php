<?php

class HousingController extends BaseController {
	public function showListings() {
		return View::make('housing.listings'); 
	}
}
