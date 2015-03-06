
<form method="post" action="?app=oma&action=vastaus">
    
    <?php
    
    if ($this->model->arvattu)
    {
        echo 'vastauksesi: '.$this->model->arvaus.' oli...';
            echo ($this->model->vastausOikein( $this->model->arvaus )) ? 'oikein.' : 'vaarin.'; 
            
    }?>
    
    
<h2>Paljonko on <?php echo ($this->model->annaKysymys()); ?></h2>
= <input type="text" name="answer" value="" /><br />
<input type="submit" name="Vastaus" label="Vastaukseni" value="Vastaa" />
</form>
 

 