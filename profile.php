<?php
$duck_is_live = false;

if (isset($_GET['id'])) {
    // Assign a vAriable to id
    $id = htmlspecialchars($_GET['id']);
    // Get duck info from the database
    // Connect to db
    require('./config/db.php');
    // Delete record - code HERE!
    if (isset($_POST['delete'])) {
        $id_to_delete = $_POST['id_to_delete'];
        $delete_sql = "DELETE FROM ducks WHERE id=$id_to_delete";
        if (mysqli_query($conn, $delete_sql)) {
            header("Location:./index.php");
            
        } else {
            echo "Error deleting record :(" . mysqli_error($conn);
        }
    }
    // mysqli_close($conn); //maybe?

    // Create query to select the intended duck form the db
    $sql = "SELECT id, name, favorite_foods, bio, img_src FROM ducks WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $duck = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

    // print_r($duck);

    if (isset($duck['id'])) {
        $duck_is_live = true;
    }
}
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
        <?php if ($duck_is_live) : ?>
            <section class="profile">
                <div class="page-title">
                    <h1>DUCK PROFILE</h1>
                </div>
                <div class="wrapper">
                    <div class="grid-container">
                        <div class="grid-profile-photo">
                            <img src="<?php echo $duck['img_src']; ?>" alt="Duck">
                        </div>
                        <div class="grid-profile-content">
                            <h2><?php echo $duck['name']; ?></h2>
                            <p><b>Favorite Food: </b><?php echo $duck['favorite_foods']; ?></p>
                            <h3><?php echo $duck['bio']; ?></h3>
                            <!-- <p>Quackwell is always wrapped up in his favorite Victorian-style coat, ensuring he's both cozy and stylish. With a blend of timeless charm and feather-friendly warmth, this frosty fellow sets the trend for winter chic.</p> -->

                        </div>
                    </div>
                </div>

            </section>
        <?php else : ?>
            <section class="no-duck"></section>
            <h1>Sorry, this duck does not exist</h1>
        <?php endif ?>

        <form action="./profile.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $duck['id']; ?>">
            <input type="submit" name="delete" value="Delete Duck">
        </form>

        <!-- <h2>Meet Quackwell Frostington!</h2> -->
        <!-- <p>Get to know our duck models and see their cool styles. Each duck has its own look and personality. Find some inspiration for your own ducks!</p> -->
        <!-- <h2>Biography</h2> -->
        <!-- <p>Born in the heart of the frosty pond, Duckington Frostwell emerged into the world with a penchant for chilly elegance. </p>
        <p>From the earliest days, this dapper duck showcased a flair for winter fashion, donning his first Victorian-style coat at a tender age.</p>
        <p>Duckington's frosty charisma and love for winter wonderlands quickly made him a style icon, setting the stage for a biography filled with cool adventures and quack-tastic charm.</p>
        </div> -->


    </main>
    <?php
    include('./asset/components/footer.php');
    ?>