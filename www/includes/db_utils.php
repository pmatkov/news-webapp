<?php
    
    function db_connect() {

        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pwa_projekt";
       
        $dbc = mysqli_connect($server, $username, $password, $dbname) 
            or die("Error connecting to MySQL server." . mysqli_connect_error());

        mysqli_set_charset($dbc, "utf8");

        return $dbc;
    }

    function get_articles($category) {

        $dbc = db_connect();

        $stmt = mysqli_stmt_init($dbc);

        $query = "SELECT * FROM news WHERE category = ? and archived = 0 LIMIT 3";

        if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 's', $category);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result))
            {
                $id = $row["id"];
                $title = $row["title"];
                $image = $row["image"];
    
                $alt_text = ucfirst(str_replace("-"," ", pathinfo($image, PATHINFO_FILENAME)));
    
                echo "<article class=\"$category-article\">";
                echo "<figure>";
                echo "<img class=\"small-img\" src=\"images/$image\" alt=\"$alt_text\">";
                echo "<figcaption><a href=\"article.php?id=$id\">$title</a></figcaption>";
                echo "</figure>";
                echo '</article>';
            } 
        }

        mysqli_stmt_close($stmt);
        mysqli_close($dbc);

        return $result;
    }
  
    function get_single_article($id) {

        $dbc = db_connect();

        $stmt = mysqli_stmt_init($dbc);

        $query = "SELECT * FROM news WHERE id = ?";

        if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 'i', $id);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            $row = mysqli_fetch_assoc($result);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($dbc);

        return $row;
    }

    if (isset($_POST['mode'], $_POST['id']) && $_POST['mode'] === 'delete') {

        delete_article($_POST['id']);
        unset($_POST['mode'], $_POST['id']);

    }

    function delete_article($id) {
        
        $dbc = db_connect();

        $stmt = mysqli_stmt_init($dbc);

        $query = "DELETE FROM news WHERE id = ?";

        if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 'i', $id);

            $result = mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($dbc);

        session_start();

        if ($result)
            $_SESSION['delete_status'] = "Article successfully deleted";
        else 
            $_SESSION['delete_status'] = "Article deletion failed";

    }

?>
