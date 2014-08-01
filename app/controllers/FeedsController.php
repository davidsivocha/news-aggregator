<?php

class FeedsController extends \BaseController {

	public function getIndex(){
    	$news_raw = Feeds::whereActive(1)->whereCategory('News')->get();
        $esports_raw = Feeds::whereActive(1)->whereCategory('Esports')->get();
        $technology_raw = Feeds::whereActive(1)->whereCategory('Technology')->get();
        
        return View::make('index')
            	->with('news', $news_raw)
            	->with('esports', $esports_raw)
            	->with('technology', $technology_raw);
    }
    
	public function getCreate(){
		return View::make('create_feed');
	}
    
    public function postCreate(){
        //Validate the post content
        $validation = Validator::make(Input::all(), Feeds::$form_rules);
        
        if($validation->passes()){
            $create = Feeds::create(array(
                'feeds'		=> Input::get('feed'),
                'title'		=> Input::get('title'),
                'active'	=> Input::get('active'),
                'category'	=> Input::get('category')
            ));
            
            if($create)
                return Redirect::to('feeds/create')->with('message', 'The feed has been added to the database');
            return Redirect::to('feeds/create')->with('message', 'The feed could not be added, please try again later');
        } else {
            return Redirect::to('feeds/create')->withInput()->with('message', $validation->errors()->first());
        }
    }

}
