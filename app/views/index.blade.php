<!DOCTYPE html>
<html lang="en">
    <head>
        <title>News Aggregator</title>
        <meta charset="utf-8">
        <style type="text/css">
        	body{font-family: Tahoma, Arial, sans-serif;}
            h1, h2, h3, strong{color:#666;}
            blockquote{background:#bbb; border-radius:3px;}
            li{border:2px solid #ccc; border-radius:5px; list-style-type:none; margin-bottom:10px;}
            a{color:#1B9BE0;}
        </style>
    </head>
    <body>
        <h1>News Aggregator</h1>
        <h2>Latest News</h2>
        @if(count($news))
        	@foreach($news as $each)
        		<h3>News from {{$each->title}}</h3>
        		<ul>
        			<?php $feeds = Str::parse_feed($each->feed); ?>
                    @if(count($feeds))
                    	@foreach($feeds as $eachfeed)
                    		<li>
                    			<strong>{{$eachfeed->title}}</strong><br />
                                <blockquote>
                                    {{Str::limit(strip_tags($eachfeed->description), 250)}}
                                </blockquote>
                                <strong>Date: {{$eachfeed->pubDate}}</strong><br />
                                <strong>Source: {{HTML::link($eachfeed->link, Str::limit($eachfeed->link, 35))}}</strong>
                    		</li>
                    	@endforeach
                    @else
                    	<li>No News found for {{$each->title}}</li>
                    @endif
		        </ul>
        	@endforeach
        @else
        	<p>No News Found</p>
        @endif
        
        <hr />
        
        <h2>Latest Esports News</h2>
        @if(count($esports))
        	@foreach($esports as $each)
        		<h3>Esports News from {{$each->title}}</h3>
        		<ul>
        			<?php $feeds = Str::parse_feed($each->feed); ?>
                    @if(count($feeds))
                    	@foreach($feeds as $eachfeed)
                    		<li>
                    			<strong>{{$eachfeed->title}}</strong><br />
                                <blockquote>
                                    {{Str::limit(strip_tags($eachfeed->description), 250)}}
                                </blockquote>
                                <strong>Date: {{$eachfeed->pubDate}}</strong><br />
                                <strong>Source: {{HTML::link($eachfeed->link, Str::limit($eachfeed->link, 35))}}</strong>
                    		</li>
                    	@endforeach
                    @else
                    	<li>No Esports News found for {{$each->title}}</li>
                    @endif
		        </ul>
        	@endforeach
        @else
        	<p>No Esports News Found</p>
        @endif
        
        <hr />
        
        <h2>Latest Technology News</h2>
        @if(count($technology))
        	@foreach($technology as $each)
        		<h3>Technology News from {{$each->title}}</h3>
        		<ul>
        			<?php $feeds = Str::parse_feed($each->feed); ?>
                    @if(count($feeds))
                    	@foreach($feeds as $eachfeed)
                    		<li>
                    			<strong>{{$eachfeed->title}}</strong><br />
                                <blockquote>
                                    {{Str::limit(strip_tags($eachfeed->description), 250)}}
                                </blockquote>
                                <strong>Date: {{$eachfeed->pubDate}}</strong><br />
                                <strong>Source: {{HTML::link($eachfeed->link, Str::limit($eachfeed->link, 35))}}</strong>
                    		</li>
                    	@endforeach
                    @else
                    	<li>No Technology News found for {{$each->title}}</li>
                    @endif
		        </ul>
        	@endforeach
        @else
        	<p>No Technology News Found</p>
        @endif
    </body>
</html>