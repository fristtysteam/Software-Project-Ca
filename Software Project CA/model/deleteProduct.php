<?php
require_once 'databaseConnection.php';

function deleteProduct($productId, $db) {
    $query = "DELETE FROM product WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$productId]);

    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

if(isset($_GET['deleteProduct'])) {
    $productId = $_GET['deleteProduct'];

    if(deleteProduct($productId, $db)) {
        header("Location:../controller/index.php?action=adminViewProducts");
        exit();
    } else {
        echo "Failed to delete product.";
    }
}
?>