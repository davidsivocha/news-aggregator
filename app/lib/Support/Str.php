<?php
namespace app\lib\Support;
class Str extends \Illuminate\Support\Str {
	public static function parse_feed($url){
        $feed = simplexml_load_file($url);
        if(!count($feed)){
            return array();
        } else {
            $out = array();
            $items = $feed->channel->item;
            for($i=0;$i<5;$i++){
                $out[] = $items[$i];
            }
            return $out;
        }
            
    }   
}