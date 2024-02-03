<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Form";
include('./asset/components/head.php');
?>
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $food = htmlspecialchars($_POST['food']);
    $upload = htmlspecialchars($_POST['upload']);
    $message = htmlspecialchars($_POST['message']);

    echo $name . ", " . $food . ", " . $upload . ", " . $message;
}
?>

<?php
if (isset($_POST['submit'])) {
}
?>

<body>
    <?php
    include('./asset/components/navigation.php');
    ?>
    <main>
        <h1>Create a Duck</h1>
        <div class="form">
            <form action="./create-duck.php" method="POST">
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="input-group">
                    <label for="food">Favorite food (separate multiple with a comma)</label>
                    <input type="text" name="food" id="food">
                </div>
                <div class="input-group">
                    <!-- Upload Section -->
                     <input type="file" name="upload" id="upload">
                        <input type="submit" value="Upload" name="submit">
                </div>
                <div class="input-group">
                    <label for="message">Duck Biography</label>
                    <textarea name="message" id="message" rows="10"></textarea>
                </div>
                <div class="input-submit"><input type="submit" value="Submit" /></div>
            </form>
        </div>
    </main>
    <?php
    include('./asset/components/footer.php');
    ?>