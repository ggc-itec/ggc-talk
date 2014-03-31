<?php
  
  class LocationController extends BaseController
  {
    public function showList()
    {
      $locations = Location::all();
      return View::make('locations.list', compact('locations'));
    }
    
    public function create()
    {
      return View::make('locations.create');
    }
    
    public function showMap(Location $location)
    {
      return View::make('locations.map', compact('location'));
    }
    
    public function handleCreate()
    {
      $location = new Location();
      $location->name = Input::get('name');
      $location->longitude = Input::get('longitude');
      $location->latitude = Input::get('latitude');
      $location->description = Input::get('description');
      $location->save();
      
      return Redirect::action('LocationController@showList');
    }
    
    public function edit(Location $location) 
    {
      return View::make('locations.edit', compact('location'));
    }
    
    public function handleEdit()
    {
      $location = Location::findOrFail(Input::get('id'));
      $location->name = Input::get('name');
      $location->longitude = Input::get('longitude');
      $location->latitude = Input::get('latitude');
      $location->description = Input::get('description');
      $location->save();
      return Redirect::action('LocationController@showList');
    }
    
    public function delete(Location $location)
    {
      return View::make('locations.delete', compact('location'));  
    }
    
    public function handleDelete()
    {
      $id = Input::get('location');
      $location = Location::findOrFail($id);
      $location->delete();
      
      return Redirect::action('LocationController@showList');
    }
  }
