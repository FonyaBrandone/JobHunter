<?php
class Session{
    function start(){
        session_start();
    }
    function stop(){
        session_destroy();
    }
}
?>