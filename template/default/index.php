<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>WWW Programming Frontpage</title>
<link rel="stylesheet" type="text/css" href="template/default/main.css" />
<link rel="stylesheet" type="text/css" href="template/default/template.css" />
<link rel="stylesheet" type="text/css" href="template/default/tyylitiedosto.css" />





<style type="text/css">
.menu{
    width: 100%;
    background-color: #333; 
}

.menu ul{
    margin: 0; padding: 0;
    float: left;}
 
.menu ul li{
    display: inline;}
 
.menu ul li a{
    float: left; text-decoration: none;
    color: white;
    padding: 10.5px 11px;
    background-color: #333; }
 
.menu ul li a:visited{
    color: white;}
 
.menu ul li a:hover, .menu ul li .current{
    color: #fff;
    background-color:#0b75b2;
}

table.sitemaptable {
    border-collapse: collapse;
}

table.sitemaptable th, table.sitemaptable td {
    padding: 5px;
}

</style>
</head>

<body>

   <!-- Begin Wrapper -->
   <div id="wrapper">
   
         <!-- Begin Header -->
         <div id="header">
		 
		       Logout ja kielen valinta jonnekin muualle	<br />
                       
                       <?php
                       $user = SomeFactory::getUser();
                       if ($user->userrole != 'guest') {
                       echo "<div>User: $user->username (<a href='?app=login&view=logout'>logout</a>)</div>";
                           
                       } else {
                           echo "<a href='?app=login'>login</a>";
                       }
                       
                       ?>
                       &nbsp;&nbsp;&nbsp;
                       <a href="?language=fi_FI">fi_FI</a>
                        &nbsp;
                       <a href="?language=en_GB">en_GB</a> 
		 </div>
		 <!-- End Header -->
		 
		 <!-- Begin Navigation -->
         <div id="navigation">
		 	
		 	<div class="menu">
<ul>
<li><a href="index.php">Koti</a></li>


</ul>
<p class="valikko"><a href="index.php">Koti</a> | <a href="manifestointi.html">Manifestointi</a> | <a href="mentorointi.html">Mentorointi</a> | <a href="kurssit.html">Kurssit</a> | <a href="tuotteet.html">Tuotteet</a> | <a href="ajankohtaista.html">Ajankohtaista</a> |
			 <a href="taustaa.html">Taustaa</a> | <a href="http://omanelamaniluoja.fi/blogi">Blogi</a> | <a href="yhteystiedot.html">Yhteystiedot</a> | <a href="http://facebook.com/omanelamaniluoja" target="_blank">Fb</a></p>
<br style="clear:left"/>
</div>		 
			   
		 </div>
		 <!-- End Navigation -->
		 
         <!-- Begin Faux Columns -->
		 <div id="faux">
		 
		       <!-- Begin Left Column -->
		       <div id="leftcolumn">
		 
		      
                           <?php 
                           include "leftcolumn.php";
                           ?>
                           
		 
		       </div>
		       <!-- End Left Column -->
		 
		       <!-- Begin Right Column -->
		       <div id="rightcolumn">
		       
	                 <some:content />
		       
			   <div class="clear"></div>
			   
		       </div>
		       <!-- End Right Column -->
			   
			   <div class="clear"></div>
			   
         </div>	   
         <!-- End Faux Columns --> 

         <!-- Begin Footer -->
         <div id="footer">
		       
               This is the Footer		

         </div>
		 <!-- End Footer -->
		 
   </div>
   <!-- End Wrapper -->
</body>
</html>