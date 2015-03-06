<?php
/**
* framework error template.
* 
* @package wo2009
*/
//error is in variable $e
if (!$e) {
	echo "error unknown<br />";
	exit;
}
$typeoferror = get_class($e);
$message = $e->getMessage();
$tracestr = $e->getTraceAsString();
?>
<h1><?php echo nl2br($message) ?></h1>
<p>
<?php
echo "<pre>";
echo $tracestr;
echo "</pre>";
?>
</p>
<p style="font-size:8px">debug: <?php echo $typeoferror ?></p>