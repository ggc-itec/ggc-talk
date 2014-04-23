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
		}
		else {
			return View::make('housing.post');
		}
	}
	
	/**
	 * currently returns a post success view;
	 * will eventually handle the database stuff to post a new listing
	 */
	public function handleAddPost() {
		return View::make('housing.postSuccess');
	}
	
	/**
	 * must be logged in to post listings, so redirect to login page, once login is
	 * successful the user is redirected back to the post listing page
	 */
	public function redirectToLogin() {
		if (Auth::guest())	{
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
		if (Auth::guest())	{
			return Redirect::guest('register');
		}
		else {
			return Redirect::to('housing/post') -> with(array('alert' => 'Welcome! You have successfully created an account, and have been logged in.', 'alert-class' => 'alert-success'));
		}
	}

}
