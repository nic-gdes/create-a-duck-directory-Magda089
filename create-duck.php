<?php
// Check for post 
if (isset($_POST['submit'])) {
// Create error array 
$errors = array(
    "name" => "",
    "favorite_foods" => "",
    "bio" => "",
);

$name = htmlspecialchars($_POST["name"]);
$favorite_foods = htmlspecialchars($_POST["favorite_foods"]);
$bio = htmlspecialchars($_POST["bio"]);

// Checl if the name exist
if (empty($name)) {
    // if it doesn't, throw error
    $errors['name'] = "A name is require";
} else {
    // "If does check again regax
    if (!preg_match('/^[a-z-\s]+$/i', $name)) {
        $errors["name"] = "The name has illigal character";
}
}

// Check if favorite foods exist
if(empty($favorite_foods)) {
// if does not throw error "required
$errors ['favorite_foods'] = "No favorite foods?";
} else {
    // If doed, check against regex
    if(!preg_match('/^[a-z,\s]+$/i', $favorite_foods))
    $errors['favorite_foods'] = "Favorite foods must be a comma separate list";
}


if(!array_filter($errors)) {
    // if all good
    header("Location:./index.php");
} else {
    // if errors
   
}
}
// /Check if BIO is empty
if(empty($bio)) {
    // error if so
    $errors ["bio"] = " A bio is required";
} 





print_r($errors);
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
            <form action="./create-duck.php" id="create-duck" method="POST">
                <div class="input-group">
                    <label for="name">Name</label>

                    <?php  
                    if (isset($errors["name"])){ 
                        echo "<div class='error'>" . $errors["name"] . "</div>";
                    }
                        ?>

                    <input type="text" name="name" id="name" value="<?php if(isset($name)) {echo $name;} ?>">
                </div>
                <div class="input-group">
                    <label for="food">Favorite food (separate multiple with a comma)</label>
                    <?php  
                    if (isset($errors["favorite_foods"])){ 
                        echo "<div class='error'>" . $errors["favorite_foods"] . "</div>";
                    }
                        ?>
                    <input type="text" name="favorite_foods" id="food" value="<?php if(isset($favorite_food)) {echo $favorite_food;} ?>">
                </div>
                <!-- Upload Section -->
                <div class="input-group">
                    <input type="file" name="upload" id="upload">
                    <input type="submit" value="Upload" name="submit">
                </div>
                <div class="input-group">
                    <label for="message">Duck Biography</label>
                    <?php  
                    if (isset($errors["bio"])){ 
                        echo "<div class='error'>" . $errors["bio"] . "</div>";
                    }
                        ?>
                    <textarea name="bio" id="message" rows="10">
                    <?php if(isset($bio)) {echo $bio;} ?>
                    </textarea>
                </div>
                <div class="input-submit"><input name="submit" type="submit" value="Add Duck" /></div>
            </form>
        </div>
    </main>
    <?php
    include('./asset/components/footer.php');
    ?>