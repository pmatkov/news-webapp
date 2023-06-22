<?php
    session_start();
?>  
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php  
        $ptitle = "Scientist";
        include('includes/head.php');
    ?>
    </head>
    <body>
        <?php  
            $selected = "index";
            include('includes/header.php');
        ?>
        <main class="container-outside">
            <div class="sidebar"></div>
            <div class="central">
                <section id="energy">
                    <hr>
                    <h1>Energy</h1>
                    <div class="container">
                    <?php
                        include('includes/db_utils.php');
                        include('includes/display.php');
                        
                        $result = get_articles("energy");
                        display_articles($result);
                      
                    ?> 
                    </div>
                </section>

                <section id="technology">
                    <hr>
                    <h1>Technology</h1>
                    <div class="container">
                    <?php
                        $result = get_articles("technology");
                        display_articles($result);
                    ?> 
                    </div>
                </section>

                <section id="space">
                    <hr>
                    <h1>Space</h1>
                    <div class="container">
                    <?php
                        $result = get_articles("space");
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