<?php

class HousingController extends BaseController {
	
	/**
	 * displays all current housing listings on main housing search page
	 */
	public function showListings() {
		$housing_listings = Housing_listing::all()->reverse();
		return View::make('housing.listings')->withHousing_listings($housing_listings);
	}
	
	/**
	 * view of a single listing
	 */
	public function viewListing(Housing_listing $housing_listing) {
		return View::make('housing.viewListing', compact('housing_listing'));	;
	}

	/**
	 * returns the post listing view if user is logged in, otherwise it redirects to 'housing'
	 */
	public function addListing() {
		if (Auth::guest()) {
			return Redirect::to('housing');
		} 
		else {
			return View::make('housing.post');
		}
	}
	
	/**
	 * adds all fields of the post listing form to the housing_listings table
	 * and then redirects to previewPost
	 * 
	 * FIXME: currently overwrites an existing image file with same name as new file
	 */
	public function handleAddListing() {
		$housing_listing = new Housing_listing(Input::all());
		$housing_listing->author = Auth::user()->id;
		
		$housing_pic = new Housing_pic();
		$inputs = Input::file();
		
		if (!$housing_listing->validate(Input::all())) {
			if (!$housing_pic->validate($inputs)) {
				return Redirect::back()->withInput()->withErrors(array_merge($housing_listing->getErrors()->toArray(), $housing_pic->getErrors()->toArray()));
			}
			return Redirect::back()->withInput()->withErrors($housing_listing->getErrors());
		}
		
		else {
			if (!$housing_pic->validate($inputs)) {
				return Redirect::back()->withInput()->withErrors($housing_pic->getErrors());
			}
			
			$housing_listing->save();
			
			foreach ($inputs as $file) {
				if ($file != null) {
					$housing_pic = new Housing_pic();
					$fileName = $file->getClientOriginalName();
					$upload_success = $file->move('images', $fileName);
					$housing_pic->filename = $fileName;
					$housing_pic->housing_listing_id = $housing_listing->id;
					$housing_pic->save();
				}
			}
			
			return Redirect::to('housing/previewListing/' . $housing_listing->id) -> with(array('alert' => 'Post successful.', 'alert-class' => 'alert-success'));
		}
	}
	
	// returns a view with a preview of the listing
	public function previewListing(Housing_listing	$housing_listing) {
		if (Auth::guest()) {
			return Redirect::to('housing');
		} 
		else {
			return View::make('housing.previewListing', compact('housing_listing'));
		}
	}
	
	//FIXME: add view and route
	public function editListing(Housing_listing $housing_listing) {
		if (Auth::guest()) {
			return Redirect::to('housing');
		} 
		else {
			return View::make('housing.editListing', compact('housing_listing'));
		}
	}
	
	//FIXME: add code
	public function handleEditListing() {
		
	}
	
	// deletes the selected listing
	public function handleDeleteListing(Housing_listing $housing_listing) {
		$housing_pics = $housing_listing->images()->get();
		foreach ($housing_pics as $pic) {
			//FIXME:need to delete pic files as well
			$pic->delete();
		}
		$housing_listing->delete();
		return Redirect::to('housing/myListings');
	}
	
	// returns a view with a list of all of the current user's listings
	public function viewMyListings() {
		if (Auth::guest()) {
			return Redirect::to('housing');
		} 
		else {
			$my_listings = Housing_listing::whereAuthor(Auth::user()->id)->get()->reverse();
			return View::make('housing.myListings')->withMy_listings($my_listings);
		}
	}

	/**
	 * must be logged in to post listings, so redirect to login page, once login is
	 * successful the user is redirected back to the post listing page
	 */
	public function redirectToLogin() {
		if (Auth::guest()) {
			return Redirect::guest('login');
		} 
		else {
			return Redirect::to('housing/post') -> with(array('alert' => 'You are successfully logged in.', 'alert-class' => 'alert-success'));
		}
	}

	/**
	 * must be registered to post listings, so redirect to register page, once registration
	 * is successful the user is redirected back to the post listing page
	 */
	public function redirectToRegister() {
		if (Auth::guest()) {
			return Redirect::guest('register');
		} 
		else {
			return Redirect::to('housing/post') -> with(array('alert' => 'Welcome! You have successfully created an account, and have been logged in.', 'alert-class' => 'alert-success'));
		}
	}

}
