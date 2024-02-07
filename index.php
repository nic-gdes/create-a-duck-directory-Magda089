<?php
// Include database connection 
include('./config/db.php');
// Create SQL query
$sql = "SELECT name,favorite_foods,img_src FROM ducks";
// Query the bd and add the result to a php array
$result = mysqli_query($conn, $sql);
$ducks = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free resultfrom memory and close SQL connection
mysqli_free_result($result);
mysqli_close($conn);

// foreach($ducks as $duck) {
//     echo $duck['name'];
// }
// print_r($ducks);
?>



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
        <h1>My Ducks</h1>
        <h2></h2>
        <p>Check out our awesome collection of duck clothes. From snazzy bow ties to stylish hats, your ducks can look as cool as can be. </p>
        <div class="gallery">

            <?php foreach ($ducks as $duck) :  ?>

                <div class="grid-item">
                    <img src="<?php echo $duck["img_src"]; ?>" alt="Duck Name 1">

                    <!-- <h3>Favorite Things to Do</h3>
                    <p>Strolling by the frosty pond, enjoying chilly swims.</p>
                    <h3>Favorite Clothes</h3>
                    <p>A stylish Victorian coat to stay warm and dapper.</p> -->
                </div>
                <div class="grid-item-content">
                    <H2><?php echo $duck["name"]; ?> </H2>
                    <?php
                    // Breaks duck food into array
                    $food_list = explode(",", $duck["favorite_foods"]);
                    ?>

                    <!--  -->
                    <h3>Favorite Foods</h3>
                    <?php foreach ($food_list as $food); ?>
                    <p><?php echo $food ?></p>
                <?php endforeach ?>
                </div>

                <!-- <div class="grid-item">
                <img src="./asset/images/duck-hat.jpeg" alt="Duck Name 2">
                <div class="grid-item-content">
                    <h2>Harper Quackley</h2>
                    <h3>Favorite Foods</h3>
                    <p>Worms</p>
                    <p>Small Fish</p>
                    <p>Amphibians</p>
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
                    <h3>Favorite Foods</h3>
                    <p>Algae</p>
                    <p>Small Fish</p>
                    <p>Human-Provided Foods</p>
                    <h3>Favorite Things to Do</h3>
                    <p>Sipping tea by the English garden, strutting down the duckwalk.</p>
                    <h3>Favorite Clothes</h3>
                    <p> A chic ensemble with a stylish umbrella always at the ready for the inevitable English rain..</p>
                </div>
            </div> -->

        </div>
        <!-- </div> -->
    </main>
    <?php
    include('./asset/components/footer.php');
    ?>