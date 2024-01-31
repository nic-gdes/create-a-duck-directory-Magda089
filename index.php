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
        <h1> Cool Duck Clothes!</h1>
        <h2></h2>
        <p>Check out our awesome collection of duck clothes. From snazzy bow ties to stylish hats, your ducks can look as cool as can be. </p>
        <div class="gallery">
            <div class="grid-item">
                <img src="./asset/images/Duck-Coatk - Redbubble 2024-01-31 14-19-59.png" alt="Duck Name 1">
                <div class="grid-item-content">
                <H2><a href="./profile.php">Duckington Frostwell</a></H2>
                    <h3>Favorite Things to Do</h3>
                    <p>Strolling by the frosty pond, enjoying chilly swims.</p>
                    <h3>Favorite Clothes</h3>
                    <p>A stylish Victorian coat to stay warm and dapper.</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="./asset/images/duck-hat.jpeg" alt="Duck Name 2">
                <div class="grid-item-content">
                    <h2>Harper Quackley</h2>
                    <h3>Favorite Things to Do</h3>
                    <p>Tending to the duck farm, splashing in puddles after a good rain.</p>
                    <h3>Favorite Clothes</h3>
                    <p> A classic straw hat for shade while working on the farm.</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="./asset/images/duck-she.jpeg" alt="Duck Name 3">
                <div class="grid-item-content">
                    <h2>Reginald Drizzleton</h2>
                    <h3>Favorite Things to Do</h3>
                    <p>Sipping tea by the English garden, strutting down the duckwalk.</p>
                    <h3>Favorite Clothes</h3>
                    <p> A chic ensemble with a stylish umbrella always at the ready for the inevitable English rain..</p>
                </div>
            </div>
            
            </div>
        </div>
    </main>
    <?php
    include('./asset/components/footer.php');
    ?>