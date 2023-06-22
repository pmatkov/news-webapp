<?php
    session_start();

    if (isset($_SESSION['mode'], $_SESSION['id'])) 
        unset($_SESSION['mode'], $_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php  

        $ptitle = "Administration";

        include('includes/head.php');
        echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css\">";

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
                    <?php
                        if (isset($_SESSION['user'], $_SESSION['level']) && $_SESSION['level'] === 1) {

                            echo    "<header>
                                        <p>News articles administration</p>
                                        <br>
                                    </header>
                                    <table id=\"mytable\">";

                            include('includes/db_utils.php');

                            $dbc = db_connect();
                            
                            $query = "SELECT * FROM news";

                            $result = mysqli_query($dbc, $query);
                
                            if ($result) {

                                $id = "";

                                if (mysqli_num_rows($result)) {

                                    echo "<tr>
                                            <th class=\"narrow-col\">Id</th>
                                            <th class=\"wide-col\">Title</th>
                                            <th class=\"wide-col\">Summary</th>
                                            <th class=\"table-image\">Image</th>
                                            <th>Category</th>
                                            <th>Archived</th>
                                            <th>Date</th>
                                            <th class=\"narrow-col\">Edit</th>
                                            <th class=\"narrow-col\">Delete</th>
                                        </tr>";                            
                                    $i = 1;
                        
                                    while ($row = mysqli_fetch_array($result)) {

                                        $id = $row["id"];
                                        $title = $row["title"];
                                        $summary = $row["summary"];
                                        $contents = $row["contents"];
                                        $image = $row["image"];
                                        $category = $row["category"];
                                        $archived = $row["archived"];
                                        $article_date = $row["article_date"];

                                        $alt_text = ucwords(str_replace("-"," ", pathinfo($image, PATHINFO_FILENAME)));
        
                                        echo "<tr>";
                                        echo "<td class=\"narrow-col center\">" . $i++ . "</td>";
                                        echo "<td class=\"wide-col\"><div class=\"clamp\">$title</div></td>";
                                        echo "<td class=\"wide-col\"><div class=\"clamp\">$summary</div></td>";
                                        echo "<td class=\"table-image\"><img src=\"images/$image\" alt=\"$alt_text\"></td>";
                                        echo "<td>" . ucfirst($category) . "</td>";
                                        echo "<td class=\"center\">" . (($archived == 1) ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>') . "</td>";
                                        echo "<td>" . date("d.m.Y.", strtotime($article_date)) . "</td>";
                                        echo "<td class=\"narrow-col\"><button class=\"icon\" onclick=\"edit_entry('edit', $id)\">
                                        <i class=\"fas fa-edit\"></i></button></td>";
                                        echo "<td class=\"narrow-col\"><button class=\"icon\" onclick=\"delete_entry('" . $_SERVER['REQUEST_URI'] . "', 'delete', $id)\">
                                        <i class=\"fas fa-trash\"></i></button></td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                            else {
                                die("Error retrieving data from database." . mysqli_error($dbc));
                            }
                            
                            mysqli_close($dbc);

                            echo "</table><br>";
                    
                            echo "<div class=\"container-admin\">
                                        <a class=\"form-button\" href=\"article_form.php\">Add new article</a>
                                        <p class=\"color\">" . (isset($_SESSION['delete_status']) ? $_SESSION['delete_status'] : "") ."</p>
                                    </div>";
                            if (isset($_SESSION['delete_status']))
                                unset($_SESSION['delete_status']);
                            
                        }

                        else if (isset($_SESSION['user'], $_SESSION['level']) && $_SESSION['level'] !== 1) {
                            echo "<p class=\"color\">You don't have sufficient permission to access this page.";

                            echo "<p class=\"level\">Current authorization level: <span class=\"level\">[" .  $_SESSION['level'] . "]</span> / required <span class=\"level\">[1]</span></p>";
                        }
                        else
                            echo "<p class=\"color\">Registration is required before accessing this page.</p>
                            <p class=\"link\"><a href=\"login.php\">Sign in</a> or <a href=\"registration.php\">register</a></p>";

                    ?>
                </article>
            </div>
            <div class="sidebar"></div>
        </main>
        <?php  
            include('includes/footer.php');
        ?>
        <script src="scripts/common.js"></script>
        <script src="scripts/admin.js"></script>
    </body>
</html>