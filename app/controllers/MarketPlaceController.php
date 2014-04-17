<?php

class MarketPlaceController extends BaseController 
{
  	
    public function index()
    {
      return View::make('marketplace.marketplace');
    }
	
}