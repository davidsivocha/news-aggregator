<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Save a new ATOM Feed to Database</title>
    </head>
    
    <body>
        <h1>Save a new Atom Feed to the Database</h1>
        @if(Session::has('message'))
        <h2>{{Session::get('message')}}</h2>
        @endif
        
        {{Form::open(array('url' => 'feeds/create', 'method' => 'post'))}}
        <h3>Feeds Category</h3>
        {{Form::select('category', array('News' => 'News', 'Esports' => 'Esports', 'Technology' => 'Technology'), Input::old('category'))}}
        <h3>Feed Title</h3>
        {{Form::text('title', Input::old('title'))}}
        <h3>Feed URL</h3>
        {{Form::text('feed', Input::old('feed'))}}
        <h3>Show on site?</h3>
        {{Form::select('active', array('1' => 'Yes', '0' => 'No'), Input::old('active'))}}
        {{Form::submit('Save', array('style' => 'margin:20px 100% 0 0'))}}
        {{Form::close}}
    </body>
</html>