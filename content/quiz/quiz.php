<?php
defined('SOME_PATH') or die('Unauthorized access');
// DO your exercise here!

echo "This is an example of the form and the post and the session usage. "
. "You need to refactor this to MVC. See for example content/ folder extension";

$rand1 = rand(1,10);
$rand2 = rand(1,10);
$session = SomeFactory::getSession();


$action = isset($_GET['action']) ? $_GET['action'] : 'form';

switch($action) {
	case "form":
	$session->set("numbers", array($rand1, $rand2));
	doForm($rand1, $rand2);
	break;
	case "answer":
	$numbers = $session->get("numbers");
	doAnswer($numbers);
	$session->set("numbers", array($rand1, $rand2));
	doForm($rand1, $rand2);
	break;
        default:
	$session->set("numbers", array($rand1, $rand2));
	doForm($rand1, $rand2);

}

function doForm($rand1, $rand2) {
?>
<form method="post" action="?app=quiz&action=answer">
<h2>How much is <?php echo $rand1 ?>* <?php echo $rand2 ?></h2>
= <input type="text" name="answer" value="" /><br />
<input type="submit" name="Submit1" label="Answer" value="Do Answer" />
</form>

<?php
}

function doAnswer($numbers) {
$rand1 = $numbers[0];
$rand2 = $numbers[1];
$result = $rand1 * $rand2;
$answer = (int)$_POST['answer'];
?>
<h2><?php echo $rand1 ?>*<?php echo $rand2?> = <?php echo $result ?></h2>
<p>Your answer (<?php echo $answer ?>) was 
<?php
if ($result === $answer) {
echo "Right!";
} else {
echo "So wrong!";
}
?>
</p>

<?php
}