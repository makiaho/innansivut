<h1>
<?php
$id       = $this->quote->getId();
$thequote = $this->quote->getThequote();
$bywhom   = $this->quote->getBywhom();
$whenyear = $this->quote->getWhenyear();


 if ($id) {
	echo SomeText::sprintf('QUOTE FORM EDIT',$id);
 } else {
	echo SomeText::_('QUOTE FORM NEW');
 }
?>
</h1>
<?php
	if (!empty($this->errors)) {
		echo "<div id='errorbox'>";
		foreach ($this->errors as $error) {
			echo "<div id='erroritem'>". $error . "</div>";
		}
		echo "</div>";
	}
?>
<div class="clearfix"></div>
<style>
.formrow label {
	width:200px;
	display:block;
	float:left;
}
</style>
<form action="index.php?app=quotes&view=<?php if ($id === null) echo "create"; else echo "update"; ?>&issubmit=1&id=<?php echo $id; ?>" onsubmit="javascript:QuoteCommandSubmit.execute(event)" method="post">
	
	<div class="formrow">
	<label for="thequote"><?php echo SomeText::_('QUOTETH QUOTE') ?>:</label>
	<textarea name="thequote"><?php echo $thequote; ?></textarea>
	</div>
	
	<div class="formrow">
	<label for="bywhom"><?php echo SomeText::_('QUOTETH WHO') ?>:</label>
	<input type="text" name="bywhom" value="<?php echo $bywhom; ?>" />
	</div>

	<div class="formrow">
	<label for="whenyear"><?php echo SomeText::_('QUOTETH WHEN') ?>:</label>
	<input type="text" name="whenyear" value="<?php echo $whenyear; ?>" />
	</div>
	
	<div class="formrow">
	<input type="submit" value="<?php echo SomeText::_('SEND') ?>" />
	</div>

	
</form>
 