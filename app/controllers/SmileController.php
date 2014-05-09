<?php

class SmileController extends BaseController
{
    public function showJoke()
    {
        return View::make('smile.jokes');
    }
    
    public function showHappyVideo()
    {
        return View::make('smile.video');
    }
    
    public function showHappyPicture() // Probably of kitties
    {
        return View::make('smile.pictures');
    }
}