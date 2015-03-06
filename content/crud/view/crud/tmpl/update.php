<h1>Update</h1>

<form method="post" action="?app=crud&action=update">
    <table class='crudlist'>
        <tr><th>#id</th><td><?php echo $this->row->id ?></td></tr>
        <tr><th>Year</th><td><input type="text" name="year"  maxlength="4" value="<?php echo $this->row->year ?>" /></td></tr>
        <tr><th>Story</th><td><textarea name="story"><?php echo $this->row->story ?></textarea></td></tr>
        <tr><th>Created</th><td><?php echo $this->row->created ?></td></tr>
    </table>
    <input type="hidden" name="id" value="<?php echo $this->row->id ?>" />
    <input type="submit" name="smit" value="SEND" />
</form>

<hr />
<a href="?app=crud">List</a>