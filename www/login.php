<?php
    session_start();

    if (isset($_POST['submit'])) {

        include ('includes/db_utils.php');

        $dbc = db_connect();

        $username = mysqli_real_escape_string($dbc, $_POST['username']);
        $password = mysqli_real_escape_string($dbc, $_POST['password']);

        $query = "SELECT password, level FROM users WHERE username = ?";

        $stmt = mysqli_stmt_init($dbc);
        
        if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 's', $username);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt)){

                mysqli_stmt_bind_result($stmt, $hashedpassword, $level);

                mysqli_stmt_fetch($stmt);

                if (password_verify($password, $hashedpassword)) {

                    $_SESSION['user'] = $username;
                    $_SESSION['level'] = $level;
                    $_SESSION['message'] = "Login successful";
                }
                else {
                    $_SESSION['message'] = "Incorrect username and/or password";
                }
            }
            else {
                $_SESSION['message'] = "Incorrect username and/or password";
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
        $ptitle = "Login";
        include('includes/head.php');
    ?>
    </head>
    <body>
        <?php  
            $selected = "login";
            include('includes/header.php');
        ?>
        <main class="container-outside">
            <div class="sidebar"></div>
            <div class="central">
                <article id="single-article">
                    <?php 

                        if (!isset($_SESSION['user'])) {

                            echo "<header>
                                    <p>Sign in</p><br>
                                  </header>";

                            echo  "<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\" enctype=\"multipart/form-data\">
                                        <div class=\"form-item\">
                                            <label for=\"user\">Username:</label><br>
                                            <input type=\"text\" name=\"username\" id=\"user\" class=\"login-form\"><br>
                                            <span id=\"usermsg\" class=\"placeholder\"></span>
                                        </div>
                                        <div class=\"form-item\">
                                            <label for=\"pass\">Password:</label><br>
                                            <input type=\"password\" name=\"password\" id=\"pass\" class=\"login-form\"><br>
                                            <span id=\"passmsg\" class=\"placeholder\"></span>
                                        </div>
                                        <div class=\"button-group\">
                                            <input type=\"submit\" value=\"Sign in\" name=\"submit\" class=\"form-button\" onclick=\"validate_login_form(event)\">
                                            <input type=\"reset\" value=\"Reset\" class=\"form-button\" onclick=\"reset_login_form()\">
                                        </div>
                                    </form>";
                        }
      
                        if (isset($_SESSION['user']) && !isset($_SESSION['message']))
                            echo "<p id=\"message\" class=\"color\">You are already logged in</p>";

                        if (isset($_SESSION['message'])) {
      
                            echo "<p id=\"message\" class=\"color\">" . $_SESSION['message'] . "</p>";
                            unset($_SESSION['message']);
                        }
                        if (!isset($_SESSION['user'])) 
                            echo "<p class=\"advice\">Not signed up yet? <a href=\"registration.php\">Sign up here</a></p>";

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