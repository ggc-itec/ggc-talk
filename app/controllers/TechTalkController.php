<?php

class TechTalkController extends BaseController
{
    public function index()
    {
        $talks = Techtalk::orderBy('created_at', 'DESC')->get();
        return View::make('techtalks.index', compact('talks'));
    }

    public function showFavs()
    {

    }
	
	public function addTalk()
	{
		return View::make('techtalks.addtalk');
	}

    public function handleAdd()
    {
        $techtalk = new Techtalk();
        $techtalk->speaker = Input::get('speaker');
        $techtalk->title = Input::get('title');
        $techtalk->save();

        return View::make('techtalks.index', compact('talks'));
    }

    public function showTalk($techtalk)
    {
        $talk = Techtalk::findorfail($techtalk);
        return View::make('techtalks.talk', compact('talk'));
    }
	
	//display comments for selected tech talk
	public function displayComments(TechTalk_talk $techtalk_talk)
    {
      return View::make('techtalk.comments', compact('techtalk_talk'));
    }
	
	//to add comment on a tech talk
	public function addComment($talkid)
    {
      $comment = new Tech_comment();
      $comment->username = Input::get('user');
      $comment->body = Input::get('body');
      $comment->techtalk_id = $talkid;

      $comment->save();
      return Redirect::action('TechTalkController@showTalk', $talkid);
    }
}
