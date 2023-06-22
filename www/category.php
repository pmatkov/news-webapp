<?php
    session_start();
?>  
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php  

        $category = $_GET['id'];
        $ptitle = ucfirst($category);
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
                <section id="<?php echo $category;?>">
                    <hr>
                    <h1><?php echo ucfirst($category);?></h1>
                    <div class="container">
                    <?php
                        include('includes/db_utils.php');
                        include('includes/display.php');
                        
                        $result = get_articles($category);
                        display_articles($result);
     
                    ?> 
                    </div>
                </section>
            </div>
            <div class="sidebar"></div>
        </main>
        <?php  
            include('includes/footer.php');
        ?>
        <script src="scripts/common.js"></script>
    </body>
</html>