<?php

class HousingController extends BaseController {
	
	/**
	 * displays all current housing listings on main housing page with a paginator
	 * that splits the results in groups of 30 on separate pages
	 */
	public function showAllListings() {
		$housing_listings = Housing_listing::orderBy('updated_at', 'desc')->paginate(30);
		return View::make('housing.showAllListings')->withHousing_listings($housing_listings);
	}
	
	/**
	 * performs 1 of 3 possible queries to search housing listings with search bar input
	 * and then displays results with pagination
	 * 
	 * Query 1: text only search
	 * Query 2: text and other inputs
	 * Query 3: only other inputs - no text
	 */
	public function showSearchResults() {
		// custom query from search bar input
		$housing_listings = Housing_listing::where(function($query) {
			$input = Input::all();
			$textOnlySearch = false;
			
			// checks if all fields except search text are empty to see if query should
			// only use search text to query listings -- if all other fields are empty
			// then $textOnlySearch is set to true
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
			
			// Query 1
			// if search text is not empty and $textOnlySearch is true, then performs search text only query
			if ($input['searchText'] != '' && $textOnlySearch){
				$searchTerms = explode(' ', $input['searchText']);
				
				foreach ($searchTerms as $term) {
					$query->orWhere('title', 'LIKE', "%$term%")->orWhere('body', 'LIKE', "%$term%");
				}
			}
			
			// Query 2
			// if search text is not empty and other fields are also not empty, then
			// performs query with all non-empty input fields
			elseif ($input['searchText'] != '' && !$textOnlySearch) {
				// separates search terms to query using each term separately
				$searchTerms = explode(' ', $input['searchText']);
				
				// NOTE: two separate queries are performed: 1 with everything excluding body of listing, and 1 with
				// everything excluding title of listing. This is to ensure that results do not include listings that
				// have attributes other than what is specified by the search bar input. I tried combining a search with
				// both title and body attributes, but results were being included that contained attributes other than
				// those specified. I don't know why, but separating the queries works.
				
				// query against all listing attributes except 'body'
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
				
				// also query against all listing attributes except 'title'
				foreach ($searchTerms as $term) {
					$query->orWhere('body', 'LIKE', "%$term%");
					
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
			
			// Query 3
			// if search text is empty, performs query without search text
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
		})->orderby('updated_at', 'desc')->paginate(30);
		
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
	 * validates housing listing and housing pic input, then either returns
	 * with error messages or saves housing listing and housing pics
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
			
			// saves housing listing and each pic with reference to housing listing id if pic isn't null
			foreach ($picFiles as $picFile) {
				if ($picFile != null) {
					// sets housing listing 'hasPic' attribute then saves housing listing
					// this is necessary to retrieve housing listing id to reference with pic
					$housing_listing->hasPic = 1;
					$housing_listing->save();
					
					$housing_pic = new Housing_pic();
					
					// creates directory for pic using listin id if it doesn't already exist
					$path = 'images/housing_pics/' . $housing_listing->id;
					if (!File::isDirectory($path)) {
						File::makeDirectory($path);
					}
					
					// separates filename and extension into an associative array to set unique filename
					$fileNameInfo = pathinfo($picFile->getClientOriginalName());
					
					// sets a unique filename to prevent overwrite by adding a random string to the end of
					// the filename if the filepath already exists, otherwise it retains original file name
					// NOTE - random string to be appended to the filename is initially an empty string
					$randomStr = '';
					do{
						$fileName = $fileNameInfo['filename'] . $randomStr . '.' . $fileNameInfo['extension'];
    					$file_path = $path . '/' . $fileName;
    					$randomStr = '_' . Str::random(6);
					} while (File::exists($file_path));
					
					// uploads file and saves pic info in database
					$upload_success = $picFile->move($path, $fileName);
					$housing_pic->filename = $fileName;
					$housing_pic->housing_listing_id = $housing_listing->id;
					$housing_pic->save();
				}
			}
			
			// saves housing listing in case it wasn't already saved when saving housing pics
			// which may occur if housing pics are null
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
	
	// returns view to allow user to edit listing
	public function editListing(Housing_listing $housing_listing) {
		if (Auth::guest()) {
			return Redirect::to('housing');
		} 
		else {
			return View::make('housing.editListing', compact('housing_listing'));
		}
	}
	
	// updates housing listing with the input provided by user in the edit listing view
	//FIXME: update code to handle picture changes
	public function handleEditListing(Housing_listing $housing_listing) {
		$housing_listing->update(Input::all());
		
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
			
			// saves housing listing and each pic with reference to housing listing id if pic isn't null
			foreach ($picFiles as $picFile) {
				if ($picFile != null) {
					// sets housing listing 'hasPic' attribute then saves housing listing
					// this is necessary to retrieve housing listing id to reference with pic
					$housing_listing->hasPic = 1;
					$housing_listing->save();
					
					$housing_pic = new Housing_pic();
					
					// creates directory for pic using listin id if it doesn't already exist
					$path = 'images/housing_pics/' . $housing_listing->id;
					if (!File::isDirectory($path)) {
						File::makeDirectory($path);
					}
					
					// separates filename and extension into an associative array to set unique filename
					$fileNameInfo = pathinfo($picFile->getClientOriginalName());
					
					// sets a unique filename to prevent overwrite by adding a random string to the end of
					// the filename if the filepath already exists, otherwise it retains original file name
					// NOTE - random string to be appended to the filename is initially an empty string
					$randomStr = '';
					do{
						$fileName = $fileNameInfo['filename'] . $randomStr . '.' . $fileNameInfo['extension'];
    					$file_path = $path . '/' . $fileName;
    					$randomStr = '_' . Str::random(6);
					} while (File::exists($file_path));
					
					// uploads file and saves pic info in database
					$upload_success = $picFile->move($path, $fileName);
					$housing_pic->filename = $fileName;
					$housing_pic->housing_listing_id = $housing_listing->id;
					$housing_pic->save();
				}
			}
			
			// saves housing listing in case it wasn't already saved when saving housing pics
			// which may occur if housing pics are null
			$housing_listing->save();
			
			// redirect to listing preview with success alert
			return Redirect::to('housing/previewListing/' . $housing_listing->id)->with(array('alert' => 'Edit successful.', 'alert-class' => 'alert-success'));
		}
	}
	
	// deletes the selected listing, its related pics, and directory with physical pics
	public function handleDeleteListing(Housing_listing $housing_listing) {
		// must delete pics first, since they contain a foreign key constraint
		$housing_pics = $housing_listing->images()->get();
		foreach ($housing_pics as $pic) {
			$pic->delete();
		}
		File::deleteDirectory('images/housing_pics/' . $housing_listing->id);
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
