<?php

class SmileController extends BaseController
{
    /**
     * Show a random joke and a cat picture
     *
     * @return Response
     */
    public function showFunStuff()
    {
        return View::make('smile.fun_stuff');
    }
    
    /**
     * Show a funny/happy video
     *
     * @return Response
     */
    public function showHappyVideo()
    {
        return View::make('smile.video');
    }
}