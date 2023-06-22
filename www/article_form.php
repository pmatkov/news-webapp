<?php

    session_start();

    include('includes/db_utils.php');

    $title = "";
    $summary = "";
    $contents = "";
    $category = "";
    $archived = "";

    $mode = "";

    if (isset($_SESSION['mode'], $_SESSION['id'])) {

        $mode = $_SESSION['mode'];
        $id = $_SESSION['id'];

        $row = get_single_article($id);

        $title = $row["title"];
        $summary = $row["summary"];
        $contents = $row["contents"];
        $fname = $row["image"];
        $category = $row["category"];
        $archived = $row["archived"];

    }

    if (isset($_POST['submit'])) {

        $dbc = db_connect();

        $title =  $_POST['title'];
        $summary = $_POST['summary'];
        $contents = $_POST['contents'];
        $category = $_POST['category'];
        $archived = isset($_POST['archived']) ? 1 : 0;
        $article_date = date('Y-m-d');

        if (is_uploaded_file($_FILES['image']['tmp_name']))  {
                
            $image = $_FILES['image'];
            $dir = "images/";

            $fname = $_FILES['image']['name'];
            $path = $dir . $fname;

            if (getimagesize($_FILES['image']['tmp_name']) === false) 
                $_SESSION['message'] = "Uploaded file is not an image.";
            else 
                move_uploaded_file($image["tmp_name"], $path);  
        }

        $stmt = mysqli_stmt_init($dbc);

        if ($mode === 'edit') 
            $query = "UPDATE news SET title = ?, summary = ?, contents = ?, image = ?, category = ?, archived = ? WHERE id = ?";
        else 
            $query = "INSERT INTO news (title, summary, contents, image, category, archived, article_date) VALUES(?, ?, ?, ?, ?, ?, ?)";

        if (mysqli_stmt_prepare($stmt, $query)) {

            $types = ($mode == 'edit') ? "sssssii" : "sssssis";
            $lastarg = ($mode == 'edit') ? $id : $article_date;

            mysqli_stmt_bind_param($stmt, $types, $title, $summary, $contents, $fname, $category, $archived, $lastarg);
            
            $result = mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
        }
        
        if ($result) {

            if ($mode === 'edit') 
                $_SESSION['message'] = "Article successfully updated.";
            else 
                $_SESSION['message'] = "Article successfully added.";  
            
        } 
        else 
            $_SESSION['message'] = "Error saving article.";
                                                
        mysqli_close($dbc);

        header("Location:" . $_SERVER['REQUEST_URI'], true, 303);
        exit();

    }
?>  
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php  
        $ptitle = "News article " . (($mode === 'edit') ? 'edit' : 'submission') . " form";
        include('includes/head.php');
    ?>
    </head>
    <body>
        <?php  
            $selected = "administration";
            include('includes/header.php');
        ?>
        <main class="container-outside">
            <div class="sidebar"></div>
            <div class="central">
                <article id="single-article">
                    <header>
                    <p>News article <?php echo ($mode === 'edit') ? 'edit' : 'submission'; ?> form</p><br>
                    </header>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-item">
                            <label for="title">Article title:</label><br>
                            <input type="text" name="title" id="title" class="article-form" value="<?php echo $title; ?>"><br>
                            <span id="titlemsg" class="placeholder"></span>
                        </div>
                        <div class="form-item">
                            <label for="summary">Article summary:</label><br>
                            <textarea name="summary" id="summary" class="article-form"><?php echo $summary; ?></textarea><br>
                            <span id="summarymsg" class="placeholder"></span>
                        </div>
                        <div class="form-item">
                            <label for="contents">Article contents:</label><br>
                            <textarea name="contents" id="contents" class="article-form"><?php echo $contents; ?></textarea><br>
                            <span id="contentsmsg" class="placeholder"></span>
                        </div>
                        <div class="form-item">
                            <label for="image">Image:</label><br>
                            <div id="container-outside-img">
                                <input type="file" name="image" accept="image/*" id="image" onchange="check_image_selection()">
                                <?php
                                            
                                    $alt_text = "";
                                    $imgpath = "";
                                    $imgname = "";

                                    if ($mode === 'edit') {

                                        $alt_text = ucfirst(str_replace("-"," ", pathinfo($fname, PATHINFO_FILENAME)));
                                        $imgpath = "images/$fname";
                                        $imgname = $fname;
                                    }
        
                                    echo "<figure id=\"container-inside-img\"><img id =\"selected-image\" src=\"$imgpath\" alt=\"$alt_text\"><figcaption id=\"selected-caption\">$imgname</figcaption></figure>";
                                ?>
                            </div>
                            <span id="imagemsg" class="placeholder"></span>
                        </div>
                        <div class="form-item">
                            <label for="category">Article category:</label><br>
                            <select name="category" id="category" class="article-form">
                                <option value="">[Select]</option>
                                <option value="energy" <?php echo ($category == "energy") ? "selected" : ""; ?>>Energy</option>
                                <option value="technology" <?php echo ($category == "technology") ? "selected" : "";?>>Technology</option>
                                <option value="space" <?php echo ($category == "space") ? "selected" : "";?>>Space</option>
                            </select><br>
                            <span id="categorymsg" class="placeholder"></span>
                        </div>
                        <div class="form-item">
                            <label for="archived">Save to archive<input type="checkbox" name="archived" id="archived"  <?php echo ($archived == 1) ? "checked" : ""; ?>></label>
                        </div>
                        <div class="button-group">
                            <input type="submit" value="Submit" name="submit" class="form-button" onclick="validate_article_form(event)">
                            <input type="button" value="Reset" class="form-button" onclick="reset_article_form()">
                        </div>
                    </form>              
                    <?php 
                        if (isset($_SESSION['message'])) {

                            echo "<p class=\"color\">" . $_SESSION['message'] . "</p>";
                            unset($_SESSION['message']);
                        }
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