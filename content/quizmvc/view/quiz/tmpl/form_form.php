<form method="POST" action="?app=quizmvc&action=answer">

<table>
<tr>
<th><?php echo $this->num1 ?> * <?php echo $this->num2 ?>=</th>
<td><input type="text" name="answer" /></td>
</tr>
<tr><td colspan="2"><input type="submit" name="smit" value="SEND" /></td></tr>
</table>
</form>