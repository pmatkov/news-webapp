<?php

    session_start();

    if (isset($_POST['submit'])) {

        include 'includes/db_utils.php';

        $dbc = db_connect();
    
        $name = mysqli_real_escape_string($dbc, $_POST['name']);
        $surname = mysqli_real_escape_string($dbc, $_POST['surname']);
        $username = mysqli_real_escape_string($dbc, $_POST['username']);
        $password = mysqli_real_escape_string($dbc, $_POST['password']);
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $level = 0;

        $query = "SELECT username FROM users WHERE username = ?";

        $stmt = mysqli_stmt_init($dbc);
        
        if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 's', $username);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt)) {

                $_SESSION['message'] = "Username already exists. Please choose a different username";
            }
            else {

                $query = "INSERT INTO users (name, surname, username, password, level) VALUES (?, ?, ?, ?, ?)";

                if (mysqli_stmt_prepare($stmt, $query)) {

                    mysqli_stmt_bind_param($stmt, 'ssssi', $name, $surname, $username, $hashedpassword, $level);

                    $result = mysqli_stmt_execute($stmt);

                    if ($result) {
                        $_SESSION['message'] = "Registration successful";
                        $_SESSION['registered'] = true;
                    }
                    else
                        $_SESSION['message'] = "Registration error";

                }
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($dbc);

        header("Location:" . $_SERVER['REQUEST_URI'], true, 303);
        exit();
    
    }
?>  
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
        $ptitle = "Registration";
        include('includes/head.php');
    ?>
    </head>
    <body>
        <?php  
            $selected = "registration";
            include('includes/header.php');
        ?>
        <main class="container-outside">
            <div class="sidebar"></div>
            <div class="central">
                <article id="single-article">
                <?php

                    if (!isset($_SESSION['user'])) {

                        echo "<header>
                                <p>Registration</p><br>
                              </header>
                                <form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\" enctype=\"multipart/form-data\">
                                    <div class=\"form-item\">
                                        <label for=\"fname\">Name:</label><br>
                                        <input type=\"text\" name=\"name\" id=\"fname\" class=\"login-form\"><br>
                                        <span id=\"namemsg\" class=\"placeholder\"></span>
                                    </div>
                                    <div class=\"form-item\">
                                        <label for=\"lname\">Surname:</label><br>
                                        <input type=\"text\" name=\"surname\" id=\"lname\" class=\"login-form\"><br>
                                        <span id=\"surnamemsg\" class=\"placeholder\"></span>
                                    </div>
                                    <div class=\"form-item\">
                                        <label for=\"uname\">Username:</label><br>
                                        <input type=\"text\" name=\"username\" id=\"uname\" class=\"login-form\"><br>
                                        <span id=\"usernamemsg\" class=\"placeholder\"></span>
                                    </div>
                                    <div class=\"form-item\">
                                        <label for=\"passw\">Password:</label><br>
                                        <input type=\"password\" name=\"password\" id=\"passw\" class=\"login-form\"><br>
                                        <span id=\"passwordmsg\" class=\"placeholder\"></span>
                                    </div>
                                    <div class=\"form-item\">
                                        <label for=\"repassw\">Repeat password:</label><br>
                                        <input type=\"password\" name=\"repassword\" id=\"repassw\" class=\"login-form\"><br>
                                        <span id=\"repasswordmsg\" class=\"placeholder\"></span>
                                    </div>
                                    <div class=\"button-group\">
                                        <input type=\"submit\" value=\"Register\" name=\"submit\" class=\"form-button\" onclick=\"validate_registration_form(event)\">
                                        <input type=\"reset\" value=\"Reset\" class=\"form-button\" onclick=\"reset_registration_form()\">
                                    </div>
                                </form>";
                    }

                    if (isset($_SESSION['user']) && !isset($_SESSION['message']))
                        echo "<p id=\"message\" class=\"color\">Logout before registering</p>";                    

                    if (isset($_SESSION['message'])) {
                        echo "<p id=\"message\" class=\"color\">" . $_SESSION['message'] . "</p>";
                        unset($_SESSION['message']);
                    }
                    if (!isset($_SESSION['user']) && !isset($_SESSION['registered']))
                        echo "<p class=\"advice\">Already have an account? <a href=\"login.php\">Sign in</a></p>";
                    
                    if (isset($_SESSION['registered']))
                        unset($_SESSION['registered']);
                ?>    
                </article>
            </div>
            <div class="sidebar"></div>
        </main>
        <?php  
            include('includes/footer.php');
        ?>
        <script src="scripts/common.js"></script>
        <script src="scripts/validate.js"></script>
    </body>
</html>