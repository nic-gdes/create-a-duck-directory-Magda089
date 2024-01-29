<!DOCTYPE html>
<html lang="en">



<?php
$page_title = "Home";
include('./asset/components/head.php');
?>
</head>

<body>
    <?php
    include('./asset/components/navigation.php');
    ?>
    <main>
        <h1>WELCOME SECTION</h1>
        <div class="gallery">
            <div class="grid-item">
                <img src="./pictures/brazil.jpg" alt="Brazil">
                <div class="grid-item-content">
                    <h2>Duck Name</h2>
                    <p>Fav food.</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="./pictures/chicago.jpeg" alt="Chicago">
                <div class="grid-item-content">
                    <h2>Duck Name</h2>
                    <p>Fav food..</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="./pictures/dublin.jpeg" alt="Dublin">
                <div class="grid-item-content">
                    <h2>Duck Name</h2>
                    <p>Fav food.</p>
                </div>
            </div>
            
            </div>
        </div>
    </main>
    <?php
    include('./asset/components/footer.php');
    ?>