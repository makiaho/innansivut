<?php

?>
<form enctype="multipart/form-data" action="index.php?app=avatar&issubmit=1" method="POST">
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="<?php echo $this->fieldname ?>" type="file" />
    <input type="submit" value="Send File" />
</form>