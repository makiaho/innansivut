<h1>Answer</h1>

<p><?php echo $this->old1 ?> * <?php echo $this->old2 ?> = <?php echo $this->oldCorrect ?> </p>

<p>Your answer <?php echo $this->answer ?> is

<?php
if ($this->isCorrect) {
echo "right";
} else {
echo "wrong";
}
?>
.</p>
<p>How much is...</p>

<?php
include "form_form.php";
?>

<hr />
<a href="?app=quizmvc&action=stats">stats</a>