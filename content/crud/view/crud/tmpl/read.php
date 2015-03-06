<h1>Read</h1>


    <table class='crudlist'>
        <tr><th>#id</th><td><?php echo $row->id ?></td></tr>
        <tr><th>Year</th><td><?php echo $row->year ?></td></tr>
        <tr><th>Story</th><td><?php echo htmlentities($row->story) ?></td></tr>
        <tr><th>Created</th><td><?php echo $row->created ?></td></tr>
    </table>


<hr />
<a href="?app=crud">List</a>