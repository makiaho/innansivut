<?php
include dirname(__FILE__) . DS. "index.php";

?>

<h1>Horizontal Menu</h1>

<p>No jQuery used here, no events, just styling xhtm source.</p>

<style type="text/css">
html{
	font:11px Arial, Helvetica, sans-serif; /* Sets the font size and type for the whole html page */
	color:#333;} /* Sets the font color for the whole html page */
.menu{
	width: 100%; /* The menu should be the entire width of it's surrounding object, in this case the whole page */
	background-color: #333;} /* dark grey bg */

.menu ul{
	margin: 0;
	padding: 0;
	float: left;}

.menu ul li{
	display: inline;} /* Makes the link all appear in one line, rather than on top of each other */

.menu ul li a{
	float: left; 
	text-decoration: none; /* removes the underline from the menu text */
	color: #fff; /* text color of the menu */
	padding: 10.5px 11px; /* 10.5px of padding to the right and left of the link and 11px to the top and bottom */
	background-color: #333;}

.menu ul li a:visited{ /* This bit just makes sure the text color doesn't change once you've visited a link */
	color: #fff;
	text-decoration: none;}

.menu ul li a:hover, .menu ul li .current{
	color: #fff;
	background-color:#0b75b2;} /* change the background color of the list item when you hover over it */
</style>

<div class="menu">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Link</a></li>

            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
        </ul>
        <br style="clear: left" />
    </div>
    
<h2>Without styles</h2>
    
<div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Link</a></li>

            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
        </ul>
        <br style="clear: left" />
    </div>
    
<h2>Source</h2>

<p>http://jamesowers.co.uk/pages/css_horizontal_menu/menu.html</p>