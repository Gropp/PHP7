<?php
require_once("config.php");
echo session_id();
echo "<br/>";
echo session_save_path();
echo "<br/>";
switch(session_status()){
    //compara o int que retorna com a constante global que é mais amigavel
    case PHP_SESSION_DISABLED:
        print 'Sessoes desabilitadas';
    break;
    case PHP_SESSION_NONE:
        print 'Sessoes habilitadas, mas nenhuma existe';
    break;
    case PHP_SESSION_ACTIVE:
        print 'Sessoes habilitadas, e conetadas';
    break;
};