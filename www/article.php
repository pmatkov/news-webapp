<?php
    session_start();

    if (isset($_POST['mode'], $_POST['id'])) {

        unset($_SESSION['mode']);
        unset($_SESSION['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php  

        include ('includes/db_utils.php');
                
        $row = get_single_article($_GET['id']);

        $image = $row["image"];
        $category = $row["category"];
        $alt_text = ucfirst(str_replace("-"," ", pathinfo($image, PATHINFO_FILENAME)));

        $ptitle = $alt_text;

        include('includes/head.php');

    ?>
    </head>
    <body>
        <?php  
            $selected = $category;
            include('includes/header.php');
        ?>
        <main class="container-outside">
            <div class="sidebar"></div>
            <div class="central">
                <article id="single-article">
                    <?php
                        echo "<header>";
                        echo "<p>" . ucfirst($category) . "</p>";
                        echo "<h1>". $row["title"] . "</h1>";
                        echo "<p>" . htmlspecialchars($row["summary"]) . "</p>";
                        echo "<p id=\"date\">" . date("d F Y", strtotime($row['article_date'])) . "</p>";
                        echo "<figure>";
                        echo "<img src=\"images/" . $image . "\" alt=\"$alt_text\">";
                        echo "</figure>";
                        echo '</header>';

                        $paragraphs = explode("\n", $row["contents"]);

                        foreach ($paragraphs as $paragraph) {

                            $paragraph = trim($paragraph);

                            if (!empty($paragraph)) {
                                echo "<p>" . htmlspecialchars($paragraph) . "</p>";
                            }
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
    </body>
</html>