<h1>#<?php echo $this->quote->getId(); ?></h1>
<blockquote>
<?php echo $this->quote->getThequote();  ?>
</blockquote>
<tt><?php echo $this->quote->getBywhom() . ", " . $this->quote->getWhenyear();  ?></tt>

<p><a href="index.php?app=quotes"><?php echo SomeText::_('QUOTE LIST ALL') ?></a></p>