<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>WWW Programming Frontpage</title>
<link rel="stylesheet" type="text/css" href="template/default/main.css" />
<link rel="stylesheet" type="text/css" href="template/default/template.css" />
<script src="template/tinymce/jquery.js" type="text/javascript"></script>

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
		 
		       This is the Header		 
			   
		 </div>
		 <!-- End Header -->
		 
		 <!-- Begin Navigation -->
         <div id="navigation">
		 	
		 	<div class="menu">
<ul>
<li><a href="index.php">Frontpage</a></li>
<li><a href="index.php?app=ngg">NGG (no mvc)</a></li>
<li><a href="index.php?app=quotes">Quotes</a></li>
<li><a href="index.php?app=red">Red Master Template</a></li>
<li><a href="index.php?app=sitemap">Extensions Index</a></li>
</ul>
<br style="clear:left"/>
</div>		 
			   
		 </div>
		 <!-- End Navigation -->
		 
         <!-- Begin Faux Columns -->
		 <div id="faux">
		 
		       <!-- Begin Left Column -->
		       <div id="leftcolumn">
		 
		             
		 
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