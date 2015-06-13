<!DOCTYPE html>
<html>

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("p").hide();
    });
});
</script>
</head>

<body>
<form method="post" action="?app=oma&action=vastaus">
    
    <?php
    
    if ($this->model->arvattu)
    {
        echo 'vastauksesi: '.$this->model->arvaus.' oli...';
            echo ($this->model->vastausOikein( $this->model->arvaus )) ? 'oikein.' : 'vaarin.'; 
            
    }?>
    
    
<h2>Paljonko mahtaa olla: <?php echo ($this->model->annaKysymys()); ?></h2>
= <input type="text" name="answer" value="" /><br />
<input type="submit" name="Vastaus" label="Vastaukseni" value="Vastaa" />
</form>
<h2>This is a heading</h2>

<p>This is a paragraph.</p>
<p>This is another paragraph.</p>

<button>Click me</button>
</body>
</html>

 

 