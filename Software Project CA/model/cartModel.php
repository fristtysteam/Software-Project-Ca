<?php
require_once 'databaseConnection.php';

class CartModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Add item to cart
    public function addToCart($user_id, $product_id, $quantity)
    {
        // Check if the product exists in the product table
        $sql_product_check = "SELECT * FROM product WHERE id = :product_id";
        $stmt_product_check = $this->db->prepare($sql_product_check);
        $stmt_product_check->bindParam(':product_id', $product_id);
        $stmt_product_check->execute();

        if ($stmt_product_check->rowCount() == 0) {
            // Product does not exist
            return false;
        }

        // checking if the product already exists
        $sql_check = "SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id";
        $stmt_check = $this->db->prepare($sql_check);
        $stmt_check->bindParam(':user_id', $user_id);
        $stmt_check->bindParam(':product_id', $product_id);
        $stmt_check->execute();

        if ($stmt_check->rowCount() > 0) {
            // update quantity if it does
            $sql_update = "UPDATE cart SET quantity = quantity + :quantity WHERE user_id = :user_id AND product_id = :product_id";
            $stmt_update = $this->db->prepare($sql_update);
            $stmt_update->bindParam(':user_id', $user_id);
            $stmt_update->bindParam(':product_id', $product_id);
            $stmt_update->bindParam(':quantity', $quantity);
            if ($stmt_update->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            //add to cart if it doesnt
            $sql_insert = "INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
            $stmt_insert = $this->db->prepare($sql_insert);
            $stmt_insert->bindParam(':user_id', $user_id);
            $stmt_insert->bindParam(':product_id', $product_id);
            $stmt_insert->bindParam(':quantity', $quantity);
            if ($stmt_insert->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }


    // Remove item from the cart
    public function removeFromCart($cart_id) {
        $sql = "DELETE FROM cart WHERE id = :cart_id";

        try {
            $stmt = $this->db->prepare($sql);

            // Bind parameter
            $stmt->bindParam(':cart_id', $cart_id);

            // Execute the statement
            $stmt->execute();

            // Check if the deletion was successful
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function removeFromCartByUserId($user_id) {
        $sql = "DELETE FROM cart WHERE user_id = :user_id";

        try {
            $stmt = $this->db->prepare($sql);

            // Bind parameter
            $stmt->bindParam(':user_id', $user_id);

            // Execute the statement
            $stmt->execute();

            // Check if the deletion was successful
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    // Retrieve cart items for a user
    public function getCartItems($user_id) {
        $sql = "SELECT cart.*, product.name, product.price FROM cart 
            INNER JOIN product ON cart.product_id = product.id
            WHERE cart.user_id = :user_id";

        try {
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':user_id', $user_id);

            $stmt->execute();

            $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $cartItems;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Clear cart for a user
    public function clearCart($user_id) {
        $sql = "DELETE FROM cart WHERE user_id = :user_id";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Update product quantity
    public function updateProductQuantity($product_id, $quantity) {
        $sql = "UPDATE product SET quantity = quantity - :quantity WHERE id = :product_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
