<?php

class FeedsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
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
