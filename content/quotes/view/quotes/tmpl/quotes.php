
<h1>Quotes</h1>

<?php
if (empty($this->quotes)) {
	echo "<p>" .  SomeText::_('NO QUOTES YET') . "</p>";
} else {
?>
<table border="1">
<tr>
  <th>#</th><th><?php echo SomeText::_('QUOTETH QUOTE') ?></th>
  <th><?php echo SomeText::_('QUOTETH WHO') ?></th>
  <th><?php echo SomeText::_('QUOTETH WHEN') ?></th>
  <th><?php echo SomeText::_('QUOTETH ACTION') ?></th>
  
  </tr>
<?php
	foreach ($this->quotes as $quote) {
		$id = $quote->getId();
		?>
		<tr><td>#<a href="index.php?app=quotes&view=read&id=<?php echo $quote->getId() ?>"><?php echo $quote->getId() ?></a></td><td><?php echo $quote->getThequote() ?></td><td><?php echo $quote->getBywhom() ?></td><td><?php echo $quote->getWhenyear() ?></td>
		<td>
		  <a href="index.php?app=quotes&view=update&id=<?php echo $id ?>"><?php echo SomeText::_('QUOTE ACTION EDIT') ?></a> 
		  / 
                  <a href="index.php?app=quotes&view=delete&id=<?php echo $id ?>&csrf=<?php echo SomeCSRF::newToken() ?>"><?php echo SomeText::_('QUOTE ACTION DELETE') ?></a>
		  </td>
		</tr>

		<?php
	}
?>
</table>
<?php
}
?>
<a href="index.php?app=quotes&view=create"><?php echo SomeText::_('CREATE NEW QUOTE') ?></a>