<?php
extract($_GET, EXTR_PREFIX_ALL, "v");
extract($_POST, EXTR_PREFIX_ALL, "v");
echo $v_var1.'  |  '.$v_var2;
?>