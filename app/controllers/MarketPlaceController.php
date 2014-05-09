<?php

class MarketPlaceController extends BaseController 
{
  	
    public function index()
    {
      return View::make('marketplace.startpage');
    }
	
	public function handle_add()
	{
		$book = new Book();
		$book -> book_title = Input::get('name');
		$book -> book_author = Input::get('author');
		$book -> book_ISBN10 = Input::get('isbn10');
		$book -> book_ISBN13 = Input::get('isbn13');
		$book -> book_edition = Input::get('edition');
		$book -> book_condition = Input::get('condition');
		$book -> save();
		return Redirect::action('MarketPlaceController@index');
	}

	public function handle_search(){
		$input = Input::all();
		$results = DB::select('select * from books WHERE book_title = '.input::get('name'));
		var_dump($results);
	}

	public function go_to_search(){
		return View::make('marketplace.marketplacesearch');		
	}	

	public function go_to_add(){
		return View::make('marketplace.marketplaceadd');		
	}
}