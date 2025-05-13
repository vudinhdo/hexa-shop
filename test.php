<?php include "headerAdmin.php" ?>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "Shop_X";
$conn = new mysqli($hostname, $username, $password, $database);
mysqli_set_charset($conn, "utf8mb4");
if (isset($_POST["editP"])) {
    $id = $_GET["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $thumbnail = $_FILES["thumbnail"]["name"];
    $price = $_POST["price"];
    $amount = $_POST["amount"];
    $category_id = $_POST["category_id"];
    $create_time = $_POST["create_time"];
    $update_time = $_POST["update_time"];
    $path = "../public/assets/images/img_products/";
    $thumbnail_tmp = $_FILES["thumbnail"]["tmp_name"];
    $sql = mysqli_query($conn, "UPDATE products SET title='$title' ,description='$description',thumbnail='$thumbnail',price='$price',amount='$amount',category_id='$category_id',create_time='$create_time',update_time = '$update_time' WHERE id ='$id'");
    move_uploaded_file($thumbnail_tmp, $path . $thumbnail);
}

?>
