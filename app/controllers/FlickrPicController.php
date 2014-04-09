<?php
  
  class FlickrPicController extends BaseController 
  {
    public function index()
    {
      return View::make('flickr.pics');
    }
    
    public function showFavs()
    {
      $pics = Flickr_pic::all()->reverse();
      return View::make('flickr.favs', compact('pics'));
    }
    
    public function handleAdd()
    {
      $pic = new Flickr_pic();
      $pic->name = Input::get('name');
      $pic->url= Input::get('url');
      $pic->content = Input::get('content');
      $pic->published = Input::get('published');
      $pic->upvotes = 0;
      $pic->downvotes = 0;
      $pic->save();
      return Redirect::action('FlickrPicController@showFavs');
    }
    
    public function handleDelete()
    {
      $id = Input::get('id');
      $pic = Flickr_pic::findOrFail($id);
      $pic->delete();
      return Redirect::action('FlickrPicController@showFavs');
    }
  }
