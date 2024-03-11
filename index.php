<?php
// Include database connection 
include('./config/db.php');
// Delete record

// Create SQL query
$sql = "SELECT name,id, favorite_foods,img_src FROM ducks";
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
        <p>Check out our unique collection of duck clothes. From snazzy bow ties to stylish hats, your ducks can look as cool as can be. </p>
        <div class="gallery">
            <?php foreach ($ducks as $duck) :  ?>
                <a href="./profile.php?id=<?php echo $duck['id']; ?>">
                <div class="grid-item">
                    <div class="grid-img"> 
                    
                        <img src="<?php  echo $duck["img_src"]; ?>" alt="Duck Name 1">
                       
                    </div>
                    <div class="grid-item-content">
                        <H2><?php echo $duck["name"]; ?> </H2>
                        <?php
                        // Breaks duck food into array
                        $food_list = explode(",", $duck["favorite_foods"]);
                        ?>
                        <h3>Favorite Foods</h3>
                        <?php foreach ($food_list as $food); ?>
                        <p><?php echo $food ?></p>
                    </div>
                </div>
                </a>
            <?php endforeach ?>
        </div>
    </main>
    <?php
    include('./asset/components/footer.php');
    ?>