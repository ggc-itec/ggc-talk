<?php

class MarketPlaceController extends BaseController {

	public function index() {
		return View::make('marketplace.startpage');
	}

	public function handle_add() {
		$book = new Book();
		$book -> book_title = Input::get('name');
		$book -> book_author = Input::get('author');
		$book -> book_ISBN10 = Input::get('isbn10');
		$book -> book_ISBN13 = Input::get('isbn13');
		$book -> book_edition = Input::get('edition');
		$book -> book_condition = Input::get('condition');
		$book -> book_email = Input::get('email');
		$book -> book_description = Input::get('book_description');
		$book -> save();
		return Redirect::action('MarketPlaceController@index');
	}

	public function handle_search() {
		$books = DB::table('books') -> get();
		$array = array();
		
		if (Input::get('name') != '')
		{
			foreach ($books as $book) 
			{
				if ($book -> book_title == Input::get('name'))
				{
					array_push($array, $book);
				}
			}
		}
		else
		{
			foreach($books as $book)
			{
				array_push($array, $book);
			}
		}
		
		var_dump($array);

	}

	public function go_to_search() {
		return View::make('marketplace.marketplacesearch');
	}

	public function go_to_add() {
		return View::make('marketplace.marketplaceadd');
	}

}
