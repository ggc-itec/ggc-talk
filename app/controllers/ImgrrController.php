<?php

  class ImgrrController extends BaseController {
    
    public function upload() {
      return View::make('imgrr.upload');
    }
    
    // FIXME: refactor this ugly method
    public function handleUpload() {
      $rules = array( 'image' => 'image');
      $file = Input::file('image');
      $title = Input::get('title');
      $inputs = array(
        'image' => Input::file('image')
      );
      $validation = Validator::make($inputs,$rules);
      
      if($validation->passes()) {
        $fileName = $file->getClientOriginalName();
        $upload_success = Input::file('image')->move('images', $fileName);
        $this->saveUpload($title,$fileName);
        $pics = Imgrr_pic::all()->reverse();
        return View::make('imgrr.gallery', compact('pics'));
      }
      else
      {
        return 'You must upload an image';
      }
    }
    
    private function saveUpload($title,$fileName) {
      $pic = new Imgrr_pic();
      $pic->title = $title; 
      $pic->filename = $fileName;
      $pic->save();
      return "saved"; 
    }
    
    public function imageGallery() {
      $pics = Imgrr_pic::all()->reverse();
      return View::make('imgrr.gallery', compact('pics'));
    }

    public function displayComments(Imgrr_pic $imgrr_pic) {
      return View::make('imgrr.comments', compact('imgrr_pic'));
    }
    
    public function addComment() {
      $pic_id = Input::get('id');
      $comment = Input::get('comment');
      $imgrr_comment = new Imgrr_comment();
      $imgrr_comment->comment = $comment;
      $imgrr_comment->imgrr_pic_id = $pic_id;
      $imgrr_comment->save();
      return Redirect::action('ImgrrController@displayComments', $pic_id);
    }
    
  }
