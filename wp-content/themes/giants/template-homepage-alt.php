<?php
/*
Template Name: Giants Hompage Alt
*/
?>
<html>
<head>
<script type="text/javascript" src="//use.typekit.net/czq2nci.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">	
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/build/css/style.min.css">

</head>
<body>
<div id="page-alt" class="hfeed site">
	<header class="alt">
		<div class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-enterprises-logo-alt.png"></a></div>
		<ul class="nav">
			<li><a href="<?php echo get_stylesheet_directory_uri(); ?>/">Venues</a></li>
			<li><a href="<?php echo get_stylesheet_directory_uri(); ?>/">Services</a></li>
			<li><a href="<?php echo get_stylesheet_directory_uri(); ?>/">Events</a></li>
			<li><a href="<?php echo get_stylesheet_directory_uri(); ?>/">About</a></li>
			<li><a href="<?php echo get_stylesheet_directory_uri(); ?>/">Contact</a></li>
		</ul>
	</header>
    <div class="intro">Intro</div>										
	<div class="slider">
		<div class="flexslider">
			<ul class="slides">
				<li class="active" id="venues">
                    <div class="inside-slider">
                        <ul class="venueslides">
                            <li data-slide="<h2>AT&T Park</h2><p><a href='#' class='button'>All Venues &raquo;</a></p>" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-slides-05.jpg);"></li>
                            <li data-slide="<h2>Gotham Club</h2><p><a href='#' class='button'>Buy Tickets Venues &raquo;</a></p>" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-slides-06.jpg);"></li>
                            <li data-slide="<h2>Mission Rock</h2><p><a href='#' class='button'>Buy Tickets Venues &raquo;</a></p>" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-slides-07.jpg);"></li>
                        </ul>
                    </div>            
                </li>
				<li id="services">
                    <div class="inside-slider">
                        <ul class="serviceslides">
                            <li data-slide="<h2>The 34th America's Cup</h2><p><a href='#' class='button'>All Services &raquo;</a></p>" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-slides-08.jpg);"></li>
                        </ul>
                    </div>            
                </li>
				<li id="events">
                    <div class="inside-slider">
                        <ul class="eventslides">
                            <li data-slide="This is some text7" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-slides-09.jpg);"></li>
                            <li data-slide="This is some text9" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-slides-10.jpg);"></li>
                            <li data-slide="This is some text9" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-slides-11.jpg);"></li>
                        </ul>
                    </div>            
                </li>
			</ul>
		</div>
		<div class="stuck">
			<div class="navarea active" id="venuesnav">
				<div class="copy"></div>
                <ul class="venuesnav-slide-nav slide-nav"></ul>
			</div>
            <div class="navarea" id="servicesnav">
                <div class="copy"></div>
                <ul class="servicesnav-slide-nav slide-nav"></ul>
            </div>
            <div class="navarea" id="eventsnav">
                <div class="copy"></div>
                <ul class="eventsnav-slide-nav slide-nav"></ul>
            </div>
			<div class="slide-tabs">
				<a href="#venues" class="slider-tab active" id="venuesbutton">
					<i class="icon map-marker"></i> <span>Venues</span>
				</a>
				<a href="#services" class="slider-tab" id="servicesbutton">
					<i class="icon ticket"></i> <span>Services</span>
				</a>
				<a href="#events" class="slider-tab" id="eventsbutton">
					<i class="icon calendar"></i> <span>Events</span>
				</a>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="container pad">
			<div class="grid-bind text-group">
				<div class="block">
					<a href="/">
						<h3>About Giants Enterprises</h3>
					</a>
				</div>
				<div class="block">
						<p>In 1999, the San Francisco Giants created Giants Enterprises, a new business venture established to develop non-baseball uses for AT&T Park. Recognizing that the Giants occupy the ballpark only about 85 days a year, Giants Enterprises is dedicated to exploring revenue-generating activities that are complementary to playing Major League Baseball and are appropriate for the venue.</p>
						<p>The company is intent on becoming a key member of the hospitality and </p>
				</div>
				<div class="block">
						<p>entertainment industry in Northern California, providing a variety of services, including event management, catering, meeting planning, marketing and public relations services, graphic design, sponsorship and special-event planning. AT&T Park offers corporations, convention organizers, meeting planners and event producers an ideal venue for special events, receptions, meetings, trade shows, new product launches, music events and family entertainment activities at the park on non-game days.</p>
				</div>
			</div>
		</div>
	</div>
    <div id="bottomcarousel" class="inside-slider">
        <ul class="bottomslides">
            <li style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-slides-04.jpg);"></li>
            <li style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-slides-10.jpg);"></li>
            <li style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-slides-11.jpg);"></li>
        </ul>
    </div>

    <footer>
        <div class="footer1">
            <div class="container padding grid-bind">
                <ul class="block">
                    <li>Call Us</li>
                    <li><a href="<?php echo get_stylesheet_directory_uri(); ?>/tel:4158721800">F: 415.872.1800</a></li>
                </ul>
                <ul class="block">
                    <li>Work With Us</li>
                    <li><a href="<?php echo get_stylesheet_directory_uri(); ?>/">Request a Proposal</a></li>
                </ul>
                <ul class="block">
                    <li>Visit Us</li>
                    <li>24 Willie Mays Plaza, SF, CA</li>
                </ul>
            </div>
        </div>
        <div class="footer2">
            <div class="container padding grid-bind">
                <div class="">
                    <ul class="footnav">
                        <li><a href="">Venues</a></li>
                        <li><a href="">Services</a></li>
                        <li><a href="">Events</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
                <div class="block"></div>
                <div class="block">
                    <div class="copyright">&copy; 2014 Giants Enterprises. All Rights Reserved.</div>
                </div>
            </div>
        </div>  
    </footer>
</div>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/build/js/main.min.js"></script>
</body>
</html>