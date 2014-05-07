<?php

class MarketPlaceControllerMVCC extends BaseController 
{
  	
    public function index()
    {
      return View::make('marketplace.marketplacesearch');
    }

	public function handle_search()
	{
		return View::make('marketplace.marketplacesearch');
	}
	
}