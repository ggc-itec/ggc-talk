<?php

class FlickrPicController extends BaseController {
  public function index() {
    return View::make('flickr.pics');
  }

  public function showFavs() {
    $pics = Flickr_pic::all() -> reverse();
    return View::make('flickr.favs', compact('pics'));
  }

  public function handleAdd() {
    $pic = new Flickr_pic();
    $pic -> name = Input::get('name');
    $pic -> url = Input::get('url');
    $pic -> content = Input::get('content');
    $pic -> published = Input::get('published');
    $pic -> upvotes = 0;
    $pic -> downvotes = 0;
    $pic -> save();
    return Redirect::action('FlickrPicController@showFavs');
  }

  public function editFavPic(Flickr_pic $flickr_pic) {
    return View::make('flickr.editPic', compact('flickr_pic'));
  }

  public function handleEdit() {
    $id = Input::get('flickr_pic');
    $pic = Flickr_pic::findOrFail($id);
    $pic -> name = Input::get('new_name');
    $pic -> save();

    return Redirect::action('FlickrPicController@showFavs');
  }

  public function deleteFavPic(Flickr_pic $flickr_pic) {
    return View::make('flickr.deletePic', compact('flickr_pic'));
  }

  public function handleDelete() {
    $id = Input::get('flickr_pic');
    $pic = Flickr_pic::findOrFail($id);
    $pic -> delete();

    return Redirect::action('FlickrPicController@showFavs');
  }

}
