<?php

    session_start();

    if (isset($_POST['mode'], $_POST['id'])) {

        set_mode($_POST['mode'], $_POST['id']);
        unset($_POST['mode'], $_POST['id']);
        
        if (isset($_POST['message']))
            unset($_POST['message']);
    }

    if (isset($_POST['logout'])) {

        unset($_POST['logout']);
        logout();
    }

    function set_mode($mode, $id) {
    
        $_SESSION['mode'] = $mode;
        $_SESSION['id'] = $id;
    }

    function logout() {
      
        $_SESSION = array();
        session_destroy();
    }

?>