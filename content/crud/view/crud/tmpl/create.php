
<h1>Create</h1>

<form method="post" action="?app=crud&action=create">
    <table class='crudlist'>
        <tr><th>#id</th><td>&nbsp;-</td></tr>
        <tr><th>Year</th><td><input type="text" name="year"  maxlength="4" value="<?php echo date('Y') ?>" /></td></tr>
        <tr><th>Story</th><td><textarea name="story">...</textarea></td></tr>
        <tr><th>Created</th><td>&nbsp;-</td></tr>
    </table>
    <input type="submit" name="smit" value="SEND" />
</form>

<hr />
<a href="?app=crud">List</a>

