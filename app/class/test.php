<?php

require 'Form.php';
require 'BootstrapForm.php';

$form= new Form($_POST);

?>

<form method="POST" action"">
<?php
echo $form->input('username');
echo $form->input('password');
echo $form->submit();

?>
</form>