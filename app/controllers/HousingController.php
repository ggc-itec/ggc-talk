<?php

class HousingController extends BaseController {
	
	/**
	 * displays all current housing listings on main housing page with a paginator
	 * that splits the results in groups of 30 on separate pages
	 */
	public function showAllListings() {
		$housing_listings = Housing_listing::orderBy('id', 'desc')->paginate(30);
		return View::make('housing.showAllListings')->withHousing_listings($housing_listings);
	}
	
	/**
	 * searches housing listings with search bar input and then displays results with pagination
	 */
	public function showSearchResults() {
		
		$housing_listings = Housing_listing::where(function($query) {
			$input = Input::all();
			$textOnlySearch = false;
			
			// check if all fields except search text are empty
			if ($input['searchText'] != '') {
				$inputFields = Input::except('searchText');
				$totalFields = count($inputFields);
				$countEmptyFields = 0;
				foreach ($inputFields as $field) {
					if ($field == '') {
						$countEmptyFields++;
					}
				}
				if ($countEmptyFields == $totalFields) {
					$textOnlySearch = true;
				}
			}
			
			// performs search text only query
			if ($input['searchText'] != '' && $textOnlySearch){
				$searchTerms = explode(' ', $input['searchText']);
				
				foreach ($searchTerms as $term) {
					$query->orWhere('title', 'LIKE', "%$term%")->orWhere('body', 'LIKE', "%$term%");
				}
			}
			
			// perform query with all non-empty input fields
			elseif ($input['searchText'] != '' && !$textOnlySearch) {
				$searchTerms = explode(' ', $input['searchText']);
				
				// query all listing attributes except body
				foreach ($searchTerms as $term) {
					$query->orWhere('title', 'LIKE', "%$term%");
					
					if ($input['rent'] != '') {
						$query->where('rent', '<=', $input['rent']);
					}
					if ($input['distance'] != '') {
						$query->where('distance', '<=', $input['distance']);
					}
					if ($input['type'] != '') {
						$query->where('type', '=', $input['type']);
					}
					if ($input['bedrooms']) {
						$query->where('bedrooms', '>=', $input['bedrooms']);
					}
					if (isset($input['hasPic'])) {
						$query->where('hasPic', '=', $input['hasPic']);
					}
				}
				
				// query all listing attributes except title
				foreach ($searchTerms as $term) {
					$query->orWhere('body', 'LIKE', "%$term%");
					
					$query->orWhere('title', 'LIKE', "%$term%");
					
					if ($input['rent'] != '') {
						$query->where('rent', '<=', $input['rent']);
					}
					if ($input['distance'] != '') {
						$query->where('distance', '<=', $input['distance']);
					}
					if ($input['type'] != '') {
						$query->where('type', '=', $input['type']);
					}
					if ($input['bedrooms']) {
						$query->where('bedrooms', '>=', $input['bedrooms']);
					}
					if (isset($input['hasPic'])) {
						$query->where('hasPic', '=', $input['hasPic']);
					}
				}
			}
			
			// perform query without search text
			elseif ($input['searchText'] == '') {
				if ($input['rent'] != '') {
					$query->where('rent', '<=', $input['rent']);
				}
				if ($input['distance'] != '') {
					$query->where('distance', '<=', $input['distance']);
				}
				if ($input['type'] != '') {
					$query->where('type', '=', $input['type']);
				}
				if ($input['bedrooms']) {
					$query->where('bedrooms', '>=', $input['bedrooms']);
				}
				if (isset($input['hasPic'])) {
					$query->where('hasPic', '=', $input['hasPic']);
				}
			}
			
			
		})->orderby('id', 'desc')->paginate(30);
		
		return View::make('housing.showSearchResults')->withHousing_listings($housing_listings)->withInput(Input::all());
	}
	
	/**
	 * view of a single listing
	 */
	public function viewListing(Housing_listing $housing_listing) {
		return View::make('housing.viewListing', compact('housing_listing'));
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
	 * validates housing listing and housing pic input, then either returns with error messages
	 * or saves housing listing and housing pics
	 * 
	 * FIXME: currently overwrites an existing image file with same name as new file
	 */
	public function handleAddListing() {
		$housing_listing = new Housing_listing(Input::all());
		$housing_listing->author = Auth::user()->id;
		
		$housing_pic = new Housing_pic();
		$picFiles = Input::file();
		
		// if housing listing input doesn't validate, check validation for housing pics then return with error messages
		if (!$housing_listing->validate(Input::all())) {
			// if housing pic input doesn't validate, return with error messages
			if (!$housing_pic->validate($picFiles)) {
				// return with housing listing and housing pic validation error messages
				return Redirect::back()->withInput()->withErrors(array_merge($housing_listing->getErrors()->toArray(), $housing_pic->getErrors()->toArray()));
			}
			// return with only housing listing validation error messages
			return Redirect::back()->withInput()->withErrors($housing_listing->getErrors());
		}
		
		// if housing listing input validates, check validation for housing pics then either save or return with error messages
		else {
			// if housing pic input doesn't validate, return with error messages
			if (!$housing_pic->validate($picFiles)) {
				// return with housing pic validation error messages
				return Redirect::back()->withInput()->withErrors($housing_pic->getErrors());
			}
			
			// saves each picture with reference to housing listing if it isn't null
			foreach ($picFiles as $picFile) {
				if ($picFile != null) {
					// sets housing listing has pic attribute then saves housing listing
					// this is necessary to retrieve housing listing id to reference with pic
					$housing_listing->hasPic = 1;
					$housing_listing->save();
					
					$housing_pic = new Housing_pic();
					$fileName = $picFile->getClientOriginalName();
					$upload_success = $picFile->move('images', $fileName);
					$housing_pic->filename = $fileName;
					$housing_pic->housing_listing_id = $housing_listing->id;
					$housing_pic->save();
				}
			}
			
			// save housing listing in case it wasn't already saved when saving pics
			$housing_listing->save();
			
			// redirect to listing preview with success alert
			return Redirect::to('housing/previewListing/' . $housing_listing->id)->with(array('alert' => 'Post successful.', 'alert-class' => 'alert-success'));
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
