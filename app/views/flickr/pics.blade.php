@extends('layout')

@section('content')
  <div class="page-header">
      <h1> Latest from Flickr </h1>
  </div>

  <div class="panel panel-default">
    <div class="panel-body">
      <a href="{{ action('FlickrPicController@index') }}" class="btn btn-primary">Refresh</a>
      <a href="{{ action('FlickrPicController@showFavs') }}" class="btn btn-primary">Favorites</a>
    </div>
  </div>
  
<?php
  // doing a xml -> json -> array
  // why? for some reason flickr's json feed is messed up so a conversion is made to xml first
  $url = 'http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?&format=xml';
  $str = file_get_contents($url);
  $xml = simplexml_load_string($str);
  $json = json_encode($xml);
  $array = json_decode($json,TRUE);
  
  // get all pic entries from the json feed  
  $entries = $array['entry'];
  
  // for debugging purposes
  foreach($entries as $entry)
  {
    $links = $entry['link'];
    $image_link = '';
    foreach($links as $link)
    {
      $image_link = $link['@attributes']['href'];
    }
    //echo $image_link . '<br/>';
    //echo $entry['id'] . '<br/>';
    //echo $entry['content'] . '<br/>';
    //echo $entry['published'] . '<br/>';
  }
  
?>

  <table class="table table-stripped">
    <thead>
      <tr>
        <th>Thumbnail</th>
        <th>Larger Image</th>
      </tr>
    </thead>
    <tbody>
      @foreach($entries as $entry)
      <tr>
        <td>{{ $entry['content'] }}</td>
        <?php
          $links = $entry['link'];
          foreach($links as $link)
          {
            $image_link = $link['@attributes']['href'];
          }
        ?>
        <td><a href="{{ $image_link }}">{{ print_r($entry['title']) }}</a></td>
        <td>
          <form action="{{ action('FlickrPicController@handleAdd') }}" method="post" role="form">
            <input type="hidden" name="name" value="{{ print_r($entry['title']) }}" />
            <input type="hidden" name="url" value="{{ $image_link }}" />
            <input type="hidden" name="content" value="{{ htmlentities($entry['content']) }}" />
            <input type="hidden" name="published" value="{{ $entry['published'] }}" />
            <input type="submit" class="btn btn-primary" value="Add" />
          </form>
         
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="panel panel-default">
    <div class="panel-body">
      <a href="{{ action('FlickrPicController@index') }}" class="btn btn-primary">Refresh</a>
      <a href="{{ action('FlickrPicController@showFavs') }}" class="btn btn-primary">Favorites</a>
    </div>
  </div>
@stop

