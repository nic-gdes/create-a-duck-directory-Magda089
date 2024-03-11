<?php
// Check for post 
if (isset($_POST['submit'])) {

    // Create error array 
    $errors = array(
        "name" => "",
        "favorite_foods" => "",
        "bio" => "",
        "img_src" => ""
    );

    $name = htmlspecialchars($_POST["name"]);
    $favorite_foods = htmlspecialchars($_POST["favorite_foods"]);
    $bio = htmlspecialchars($_POST["bio"]);
    $img_src = $_FILES['img_src']["name"];

    // Checl if the name exist
    if (empty($name)) {
        // if it doesn't, throw error
        $errors['name'] = "A name is require";
    } else {
        // "If does check again regax
        if (!preg_match('/^[a-z-\s]+$/i', $name)) {
            $errors['name'] = "The name has illigal character";
        }
    }

    // Check if favorite foods exist
    if (empty($favorite_foods)) {
        // if does not throw error "required
        $errors['favorite_foods'] = "No favorite foods?";
    } else {
        // If doed, check against regex
        if (!preg_match('/^[a-z,\s]+$/i', $favorite_foods))
            $errors['favorite_foods'] = "Favorite foods must be a comma separate list";
    }
    // /Check if BIO is empty
    if (empty($bio)) {
        // error if so
        $errors["bio"] = " A bio is required";
    }
    // print_r($errors);

    // Handle file upload target directory
    $target_dir = "./asset/images/";
    // Target uppload image file
    $image_file = $target_dir . basename($_FILES["img_src"]["name"]);
    // Get upload file extension so we can test to make sure it's an image
    $image_file_type = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));
    // Test imzge for error:
    // image exist
    if (empty($img_src)) {
        $errors['img_src'] = "A image is require";
    } else {
        // Chech that the image file is an actual image
        $size_check = @getimagesize($_FILES["img_src"]["tmp_name"]);
        $file_size = ($_FILES["img_src"]["size"]);

        if (!$size_check) {
            $errors["img_src"] = "File is not an image";
        } else if ($file_size > 500000) {
            $errors["img_src"] = "File cannot be larger thab 500kb";
        } else if (
            $image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif" && $image_file_type != "webp"
        ) {
            $errors["img_src"] = "Sorry, only JPG, JPEG, PNG, GIF or WEBP file are allowed";
        }
        // check if file already exist
        if (move_uploaded_file($_FILES["img_src"]["tmp_name"], $image_file)) {
        } else {
            $errors["img_src"] = "Sorry, there was an error uploading your file.";
        }
    }

    if (!array_filter($errors)) {
        // if all good

        // connect to the database
        require('./config/db.php');

        // build sql query 
        $sql = "INSERT INTO ducks (name, favorite_foods, bio, img_src) VALUES ('$name', '$favorite_foods', '$bio', '$image_file')";
        // execute query in sql
        mysqli_query($conn, $sql);

        // load to homepage
        header("Location:./index.php");
    } else {
        // if errors
        print_r($errors);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Form";
include('./asset/components/head.php');
?>
</head>

<body>
    <?php
    include('./asset/components/navigation.php');
    ?>
    <main>
        <h1>Create a Duck</h1>

        <div class="form">
            <form action="./create-duck.php" id="create-duck" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="name">Name</label>

                    <?php
                    if (isset($errors["name"])) {
                        echo "<div class='error'>" . $errors["name"] . "</div>";
                    }
                    ?>

                    <input type="text" name="name" id="name" value="<?php if (isset($name)) {
                                                                        echo $name;
                                                                    } ?>">
                </div>
                <div class="input-group">
                    <label for="food">Favorite food (separate multiple with a comma)</label>
                    <?php
                    if (isset($errors["favorite_foods"])) {
                        echo "<div class='error'>" . $errors["favorite_foods"] . "</div>";
                    }
                    ?>
                    <input type="text" name="favorite_foods" id="food" value="<?php if (isset($favorite_food)) {
                                                                                    echo $favorite_food;
                                                                                } ?>">
                </div>
                <!-- Upload Section -->
                <div class="input-group">

                    <input type="file" name="img_src" id="upload">
                    <!-- <input type="submit" value="Upload" name="submit"> -->
                    <?php
                    if (isset($errors["img_src"])) {
                        echo "<div class='error'>" . $errors["img_src"] . "</div>";
                    }
                    ?>
                </div>
                <div class="input-group">
                    <label for="message">Duck Biography</label>
                    <?php
                    if (isset($errors["bio"])) {
                        echo "<div class='error'>" . $errors["bio"] . "</div>";
                    }
                    ?>
                    <textarea name="bio" id="message" rows="10"><?php if (isset($bio)) {
                                                                    echo $bio;
                                                                } ?></textarea>
                </div>
                <div class="input-submit"><input name="submit" type="submit" value="Add Duck" /></div>
            </form>
        </div>
    </main>
    <?php
    include('./asset/components/footer.php');
    ?>