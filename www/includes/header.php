<?php 

    $username = "";
    $logingrp = "flex";
    $logoutgrp = "none";

    if (isset($_SESSION['user'])) {

        $username = $_SESSION['user'];
        $logingrp = "none";
        $logoutgrp = "flex";
    }

    echo    "<header class=\"container-outside\">
                <div class=\"sidebar\"></div>
                <div class=\"central\">
                    <h1>SCIENTIST</h1>
                    <hr>    
                    <nav class=\"container-outside-nav\">
                        <ul class=\"container-inside-nav\">
                            <li><a " . (($selected === 'index') ? "id=\"selected\"" : "") .
                            " href=\"" . (($selected === 'index') ? "#" : "index.php") . "\">Home</a></li>" .
                            "<li><a " . (($selected === 'energy') ? "id=\"selected\"" : "") .
                            " href=\"" . (($selected === 'energy' && !isset($_GET['id'])) ? "#" : "category.php?id=energy") . "\">Energy</a></li>" .
                            "<li><a " . (($selected === 'technology') ? "id=\"selected\"" : "") .
                            " href=\"" . (($selected === 'technology' && !isset($_GET['id'])) ? "#" : "category.php?id=technology") . "\">Technology</a></li>" .
                            "<li><a " . (($selected === 'space') ? "id=\"selected\"" : "") .
                            " href=\"" . (($selected === 'space' && !isset($_GET['id'])) ? "#" : "category.php?id=space") . "\">Space</a></li>" .
                            "<li><a " . (($selected === 'administration') ? "id=\"selected\"" : "") .
                            " href=\"" . (($selected === 'administration' && $_SERVER['PHP_SELF'] === "administration.php") ? "#" : "administration.php") . "\">Administration</a></li>
                        </ul>
                        <ul id=\"logingrp\" class=\"container-inside-nav container-login\" style=\"display: $logingrp\">
                            <li><a " . (($selected === 'login') ? "id=\"selected-login\"" : "") . " class=\"login\"" .
                            " href=\"" . (($selected === 'login' && isset($_SESSION['user'])) ? "#" : "login.php") . "\">Sign in</a></li>" .
                            "<li><a " . (($selected === 'registration') ? "id=\"selected-register\"" : "") . " class=\"register\"" .
                            " href=\"" . (($selected === 'registration') ? "#" : "registration.php") . "\">Register</a></li>
                        </ul>
                        <ul id=\"logoutgrp\" class=\"container-inside-nav container-login\" style=\"display: $logoutgrp\">
                            <li id=\"loggedin\"><span id=\"username\">[$username]</span></li>
                            <li><button class=\"logout\" onclick=\"logout('" . $_SERVER['REQUEST_URI'] . "')\">Sign out</button></li>
                        </ul>
                    </nav>
                </div>
                <div class=\"sidebar\"></div>
            </header>";

?>