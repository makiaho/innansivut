<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <!-- Vas. yläreunasta pois turhaa tekstiä ja linkkejä (log out, kielen valinta)-->
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
    background-color: #e6d1f3; 
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
    background-color: #d4c0e0; }
 
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
		 
		       	<br />
                       
                       
                       &nbsp;&nbsp;&nbsp;
                        
		 </div>
		 <!-- End Header -->
		 
		 <!-- Begin Navigation -->
         <div id="navigation">
		 	
		 	<div class="menu">
<table align="center">
<tr>
<td width="683" align="center"></td>
<p class="valikko"><a href="index.php">Koti</a> | <a href="tuotteet.html">Tuotteet</a> | 
			 <a href="taustaa.html">Taustaa</a> | <a href="http://omanelamaniluoja.fi/blogi">Blogi</a> | <a href="yhteystiedot.html">Yhteystiedot</a> </p>
<br style="clear:left"/>
</tr>
</table>
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
		       <table>
<tr>
<td width="450"> <a href="?app=login"><u>Kirjaudu sis&auml;&auml;n</u></a>  <a href="?app=account&action=register"><u>Rekister&ouml;idy</u></a></td>
<td><p class="lomake"></p></td>
</tr>
</table>
	                 <some:content />
		       
			   <div class="clear"></div>
			   
		       </div>
		       <!-- End Right Column -->
			   
			   <div class="clear"></div>
			   
         </div>	   
         <!-- End Faux Columns --> 

         <!-- Begin Footer -->
         <div id="footer">
		       
               Copyright &copy Inna Thil	

         </div>
		 <!-- End Footer -->
		 
   </div>
   <!-- End Wrapper -->
</body>
</html>