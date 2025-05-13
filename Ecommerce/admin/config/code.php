<?php
session_start();
include 'db.php';

// Add Product
if (isset($_POST['add_product'])) {
    $name = $_POST['product_name'];
    $description = $_POST['product_description'];
    $quantity = $_POST['product_quantity'];
    $price = $_POST['product_price'];
    $is_new = isset($_POST['is_new']) ? 1 : 0;
    $is_sale = isset($_POST['is_sale']) ? 1 : 0;

    // Image upload
    $image_name = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $target_dir = "../uploads/";
        $target_file = $target_dir . $image_name;

        // Move uploaded file
        if (!move_uploaded_file($image_tmp, $target_file)) {
            die("Failed to upload image.");
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO products 
        (product_name, product_description, product_quantity, product_price, is_new, is_sale, image) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssidiis", $name, $description, $quantity, $price, $is_new, $is_sale, $image_name);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Product successfully added';
        header("Location: ../products.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}





// Add Category
if (isset($_POST['add_category'])) {
    $name = $_POST['category_name'];

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO category 
        (category_name) 
        VALUES (?)");
    $stmt->bind_param("s", $name);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Category successfully added';
        header("Location: ../category.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>