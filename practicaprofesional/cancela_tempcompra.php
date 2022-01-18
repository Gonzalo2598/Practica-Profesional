<?php

require('class_lib/class_conecta_mysql.php');
$db=new ConexionMySQL();
$mody=$db->consulta("delete from temp2 where tipo='EC'");

?>