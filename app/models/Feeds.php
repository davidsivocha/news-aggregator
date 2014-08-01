<?php
class Feeds extends Eloquent {
    protected $table = 'feeds';
    protected $fillable = array('feed', 'title', 'active', 'category');
}