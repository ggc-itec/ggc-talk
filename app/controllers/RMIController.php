<?php

  class RMIController extends BaseController {
    
    public function upload() {
      return View::make('RMI.upload');
      //return "Hello";    
	}
    
    // FIXME: refactor this ugly method
    public function handleUploadRMI() {
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
        $pics = RMI_pic::all()->reverse();
        return View::make('RMI.gallery', compact('pics'));
      }
      else
      {
        return 'You must upload an image';
      }
    }
    
    private function saveUpload($title,$fileName) {
      $pic = new RMI_pic();
      $pic->title = $title; 
      $pic->filename = $fileName;
      $pic->save();
      return "saved"; 
    }
    
    public function imageGallery() {
     $internship = Internship::all();
	  return View::make('RMI.RMI', compact('internship'));
    }

    public function displayComments(RMI_pic $RMI_pic) {
      return View::make('RMI.comments', compact('RMI_pic'));
    }
    
    public function addComment() {
      $pic_id = Input::get('id');
      $comment = Input::get('comment');
      $RMI_comment = new RMI_comment();
      $RMI_comment->comment = $comment;
      $RMI_comment->RMI_pic_id = $pic_id;
      $RMI_comment->save();
      return Redirect::action('RMIController@displayComments', $pic_id);
    }
	

	
	 public function showList()
    {
    	
		$internship = Internship::all();
		return View::make('RMI.RMI', compact('internship'));
	   //return var_dump ($internship);
	}
	
	 public function handleCreate()
    {
      $internship = new Internship();
      $internship->companyName = Input::get('companyName');
      $internship->position = Input::get('position');
      $internship->started = Input::get('started');
      $internship->compensation = Input::get('compensation');
	  $internship->hrPerWeek = Input::get('hrPerWeek');
	  $internship->comments = Input::get('comments');
	  $internship->creatorID = Input::get('creatorID');
	  
	  $internship->challenge = Input::get('challenge');
      $internship->networking = Input::get('networking');
      $internship->social = Input::get('social');
      $internship->importance = Input::get('importance');
	  $internship->experience = Input::get('experience');
      $internship->save();
      
      return Redirect::action('RMIController@showList');
	 
    }

    public function deleteInternship(Internship $internship)
    {
      return View::make('RMI.delete', compact('internship'));
    }

	public function handleDelete()
	{
	  $id=Input::get('internship');
	  $internz=Internship::findOrFail($id);
	  $internz -> delete();
	  
	  return Redirect::action('RMIController@showList');
	}

	public function editInternship(Internship $internship)
	{
	  return View::make('RMI.edit', compact('internship'));
	}
	
	public function handleEdit()
	{
	  $id=Input::get('internship');
	  $internship=Internship::findOrFail($id);
	  $internship->companyName = Input::get('companyName');
	  $internship->position = Input::get('position');
      $internship->started = Input::get('started');
      $internship->compensation = Input::get('compensation');
      $internship->hrPerWeek = Input::get('hrPerWeek');
      $internship->comments = Input::get('comments');
	  $internship->creatorID = Input::get('creatorID');
      
      $internship->challenge = Input::get('challenge');
      $internship->networking = Input::get('networking');
      $internship->social = Input::get('social');
      $internship->importance = Input::get('importance');
	  $internship->experience = Input::get('experience');
      $internship->save();
      
      return Redirect::action('RMIController@showList');
	}
    
  }
