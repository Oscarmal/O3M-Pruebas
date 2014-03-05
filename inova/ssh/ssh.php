<?php
//Conexión al servidor dónde "shell.example.com" es el servidoy y 22 el puerto. 
$connection = ssh2_connect('172.27.20.77', 22);
if (!$connection) die('Connection failed');
//Una vez conectados hay que autenticarse dónde $conecction es el manejador de la conexión y los otros valores son el usuario y la contraseña. 
ssh2_auth_password($connection, 'direksysmx', '1n0d1r3ksys');
//Por último ejecutamos el código en la máquina remota, dónde el primer parametro es el manejador de la conexión y el segundo el parametro en cuestión 
#$stream = ssh2_exec($connection, '/usr/local/bin/php -i');
$stream = ssh2_exec($connection, 'ls -l');
//Todo esto se guardaría en la variable $stream que podemos mostrar de la siguiente forma
echo "<pre>";
print_r($stream);
echo "</pre>"; ?>
