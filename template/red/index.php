<?php
/**
*
* @package template
* @subpackage red
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dynamic Drive: CSS Fixed Layout #3.3- (Fixed-Fixed-Fixed)</title>
<script src="template/default/equalcolumns.js" type="text/javascript"></script>
<style type="text/css">

body{
margin:0;
padding:0;
line-height: 1.5em;
}

b{font-size: 110%;}
em{color: red;}

#maincontainer{
width: 840px; /*Width of main container*/
margin: 0 auto; /*Center container on page*/
}

#topsection{
background: #FFAE74;
height: 90px; /*Height of top section*/
}

#topsection h1{
margin: 0;
padding-top: 15px;
}

#contentwrapper{
float: left;
width: 100%;
}

#contentcolumn{
margin-left: 370px; /*Margin for content column. Should be (RightColumnWidth + LeftColumnWidth)*/
}

#leftcolumn{
float: left;
width: 180px; /*Width of left column in pixel*/
margin-left: -840px; /*Set left margin to -(MainContainerWidth)*/
background: #FFE4D2;
}

#rightcolumn{
float: left;
width: 190px; /*Width of right column in pixels*/
margin-left: -660px; /*Set right margin to -(MainContainerWidth - LeftColumnWidth)*/
background: #FBCFE4;
}

#footer{
clear: left;
width: 100%;
background: black;
color: #FFF;
text-align: center;
padding: 4px 0;
}

#footer a{
color: #FFFF80;
}

.innertube{
margin: 10px; /*Margins for inner DIV inside each column (to provide padding)*/
margin-top: 0;
}

h1 {
color: #E61515;
}

.runo {
    width:100%;
    color: #FD6900;
}

.author {
    width:100%;
    color: #B7005A;
}

</style>



</head>
<body>
<div id="maincontainer">

<div id="topsection"><div class="innertube"><h1>CSS Fixed Layout #3.3- (Fixed-Fixed-Fixed)</h1></div></div>

<div id="contentwrapper">
<div id="contentcolumn">
<div class="innertube"><some:content /></div>
</div>
</div>

<div id="leftcolumn">
<div class="innertube">

<?php 
/**
*
*/
include('template/default/menu.php');
?>


</div>

</div>

<div id="rightcolumn">
<div class="innertube">
<!--
Primary Color:
	FD0000		E61515		DD0000		FF7474		FFD2D2
Secondary Color A:
	FD6900		E66C15		DD5C00		FFAE74		FFE4D2
Secondary Color B:
	D20067		BF1166		B7005A		FB73B6		FBCFE4
//-->
Primary Color:<hr />
    <div style='width:100px;background-color:#FD0000'>#FD0000</div>
	<div style='width:100px;background-color:#E61515'>#E61515</div>
	<div style='width:100px;background-color:#FD0000'>#FD0000</div>
	<div style='width:100px;background-color:#FF7474'>#FF7474</div>
	<div style='width:100px;background-color:#FFD2D2'>#FFD2D2</div>
Secondary Color A:<hr />
    <div style='width:100px;background-color:#E61515'>#FD6900</div>
	<div style='width:100px;background-color:#E66C15'>#E66C15</div>
	<div style='width:100px;background-color:#DD5C00'>#DD5C00</div>
	<div style='width:100px;background-color:#FFAE74'>#FFAE74</div>
	<div style='width:100px;background-color:#FFE4D2'>#FFE4D2</div>
Secondary Color B:<hr />
    <div style='width:100px;background-color:#D20067'>#D20067</div>
	<div style='width:100px;background-color:#BF1166'>#BF1166</div>
	<div style='width:100px;background-color:#B7005A'>#B7005A</div>
	<div style='width:100px;background-color:#FB73B6'>#FB73B6</div>
	<div style='width:100px;background-color:#FBCFE4'>#FBCFE4</div>


</div>
</div>

<div id="footer"><a href="http://www.dynamicdrive.com/style/">Dynamic Drive CSS Library</a></div>

</div>
</body>
</html>

