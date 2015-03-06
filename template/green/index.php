<?php
/**
*
* @package template
* @subpackage green
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
background: #E9F7BB;
}

b{font-size: 110%;}
em{color: red;}

#maincontainer{
width: 840px; /*Width of main container*/
margin: 0 auto; /*Center container on page*/
}

#topsection{
background: #DCF78A;
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
background: #ACE3D5;
}

#rightcolumn{
float: left;
width: 190px; /*Width of right column in pixels*/
margin-left: -660px; /*Set right margin to -(MainContainerWidth - LeftColumnWidth)*/
background: #7FE3CA;
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
color: #368672;
}

.runo {
    width:100%;
    color: #1C7E65;
}

.author {
    width:100%;
    color: #1C7E65;
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
<!-- color scheme
Primary Color:
	6ACD40		67B148		4CA625		A6F187		C8F1B7
Secondary Color A:
	309B80		368672		1C7E65		7FE3CA		ACE3D5
Secondary Color B:
	BDE346		A8C44F		95B829		DCF78A		E9F7BB
//-->
Primary Color:<hr />
	<div style='width:100px;background-color:#6ACD40'>#6ACD40</div>
	<div style='width:100px;background-color:#67B148'>#67B148</div>
	<div style='width:100px;background-color:#4CA625'>#4CA625</div>
	<div style='width:100px;background-color:#A6F187'>#A6F187</div>
	<div style='width:100px;background-color:#C8F1B7'>#C8F1B7</div>
Secondary Color A:<hr />
    <div style='width:100px;background-color:#309B80'>#309B80</div>
	<div style='width:100px;background-color:#368672'>#368672</div>
	<div style='width:100px;background-color:#1C7E65'>#1C7E65</div>
	<div style='width:100px;background-color:#7FE3CA'>#7FE3CA</div>
	<div style='width:100px;background-color:#ACE3D5'>#ACE3D5</div>
Secondary Color B:<hr />
    <div style='width:100px;background-color:#BDE346'>#BDE346</div>
	<div style='width:100px;background-color:#A8C44F'>#A8C44F</div>
	<div style='width:100px;background-color:#95B829'>#95B829</div>
	<div style='width:100px;background-color:#DCF78A'>#DCF78A</div>
	<div style='width:100px;background-color:#E9F7BB'>#E9F7BB</div>
</div>
</div>

<div id="footer"><a href="http://www.dynamicdrive.com/style/">Dynamic Drive CSS Library</a></div>

</div>
</body>
</html>
