<?php

$db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');

$name = $_POST['name'];
$brand = $_POST['brand'];
$color = $_POST['color'];
$price = $_POST['price'];
$status = $_POST['status'];


$sql = "SELECT * FROM cars WHERE name = :name";
$statement = $db->prepare($sql);
$statement->bindParam(':name', $name);
$statement->execute();


    if ($statement->fetchColumn() > 0) {
        header('Location: ../cars.php#error');
        exit();
    }

    else {

        $sql = "INSERT INTO cars (name, brand, color, price, status)
                VALUES (:name, :brand, :color, :price, :status)";
        $statement = $db->prepare($sql);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':brand', $brand);
        $statement->bindParam(':color', $color);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':status', $status);
        $statement->execute();

        header('Location: ../cars.php#success');
        exit();
    }