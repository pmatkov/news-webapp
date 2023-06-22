<?php

    function display_articles($result) {

        while ($row = mysqli_fetch_assoc($result)) {

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
?>