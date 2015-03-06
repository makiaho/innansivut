<h1>List</h1>

<table class='crudlist'>
    <tr><th>#</th><th>Year</th><th>Story</th><th>Created</th><th>Actions</th></tr>
    
<?php
// var_dump($this->rows);
foreach ($this->rows as $row) {
    $id = $row['id'];
    $year = $row['year'];
    $story = htmlentities($row['story']);
    $created = $row['created'];
    $hrefDelete = "<a href='?app=crud&action=askdelete&id=$id'>Delete</a>";
    $hrefUpdate = "<a href='?app=crud&action=update&id=$id'>Update</a>";
    
    ?>
    <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $year ?></td>
        <td><?php echo $story ?></td>
        <td><?php echo $created ?></td>
        <td><?php 
        echo $hrefDelete;
        echo "<br />";
        echo $hrefUpdate
        ?></td>
    </tr>
    <?php
}

?>

</table>

<hr />

 
<form action='?app=crud&action=list' method='post' />
Serach<input type='text' name='search' /> <br />
<input type='submit' />
</form>


<a href="?app=crud&action=create">Create New</a>
