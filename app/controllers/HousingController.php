<?php

class HousingController extends BaseController {

	/**
	 * displays all current housing listings on main housing search page
	 */
	public function showListings() {
		$housing_listings = Housing_listing::all();

		return View::make('housing.listings') -> withHousing_listings($housing_listings);
	}

	/**
	 * returns the post listing view if user is logged in, otherwise it redirects to 'housing'
	 */
	public function postListing() {
		if (Auth::guest()) {
			return Redirect::to('housing');
		} else {
			return View::make('housing.post');
		}
	}

	/**
	 * adds all fields of the post listing form to the housing_listings table
	 * and the redirects to previewPost
	 */
	public function handleAddPost() {
		$listing = new Housing_listing();
		$listing -> author = Auth::user()->id;
		$listing -> title = Input::get('title');
		$listing -> city = Input::get('city');
		$listing -> body = Input::get('body');
		$listing -> rent = Input::get('rent');
		$listing -> distance = Input::get('distance');
		$listing -> type = Input::get('type');
		$listing -> bedrooms = Input::get('bedrooms');
		$listing -> save();
		return Redirect::to('housing/previewPost') -> with(array('alert' => 'Post successful.', 'alert-class' => 'alert-success'));
	}

	/**
	 * must be logged in to post listings, so redirect to login page, once login is
	 * successful the user is redirected back to the post listing page
	 */
	public function redirectToLogin() {
		if (Auth::guest()) {
			return Redirect::guest('login');
		} else {
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
		} else {
			return Redirect::to('housing/post') -> with(array('alert' => 'Welcome! You have successfully created an account, and have been logged in.', 'alert-class' => 'alert-success'));
		}
	}
	
	// returns the postSuccess view with a preview of the listing
	public function previewPost() {
		return View::make('housing.previewPost') -> with(array('alert' => 'You are successfully logged in.', 'alert-class' => 'alert-success'));
	}

}
