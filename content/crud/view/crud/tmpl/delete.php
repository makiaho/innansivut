<h1>Delete</h1>

<form method="post" action="?app=crud&action=dodelete">
    <table class='crudlist'>
        <tr><th>#id</th><td><?php echo $this->row->id ?></td></tr>
        <tr><th>Year</th><td><?php echo $this->row->year ?></td></tr>
        <tr><th>Story</th><td><?php echo htmlentities($this->row->story) ?></td></tr>
        <tr><th>Created</th><td><?php echo $this->row->created ?></td></tr>
    </table>
    <input type="hidden" name="id" value="<?php echo $this->row->id ?>" />
    <input type="submit" name="smit" value="DELETE" />
</form>

<hr />
<a href="?app=crud">List</a>