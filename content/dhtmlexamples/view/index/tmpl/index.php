<h1>Dynamic Examples Index</h1>

<ul>
<?php
foreach ($this->navi as $arr) {
	$hotspot = $arr[0];
	$href    = $arr[1];
	?>
	<li><a href="<?php echo $href ?>"><?php echo $hotspot ?></a></li>
	<?php 	
}
?>
</ul>