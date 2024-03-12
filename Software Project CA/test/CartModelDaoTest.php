<<?php

use PHPUnit\Framework\TestCase;

require_once '../dao/cartModelDao.php';

class CartModelDaoTest extends TestCase {
    private $dao;
    private $pdo;

    protected function setUp(): void {
        // Establish a PDO connection to an in-memory SQLite database for testing
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the necessary tables for testing
        $this->pdo->exec("
            CREATE TABLE product (
                id INTEGER PRIMARY KEY,
                name VARCHAR(255),
                price DECIMAL(10, 2),
                quantity INTEGER
            )
        ");
        $this->pdo->exec("
            CREATE TABLE cart (
                id INTEGER PRIMARY KEY,
                user_id INTEGER,
                product_id INTEGER,
                quantity INTEGER
            )
        ");

        // Initialize the DAO with the PDO instance
        $this->dao = new CartModelDao($this->pdo);
    }

    public function testAddToCart() {
        // Add a product for testing
        $this->pdo->exec("INSERT INTO product (name, price, quantity) VALUES ('Test Product', 10.00, 5)");

        // Add to cart
        $this->assertTrue($this->dao->addToCart(1, 1, 3));
        $this->assertTrue($this->dao->addToCart(1, 1, 2));

        // Check if the quantities are updated correctly
        $stmt = $this->pdo->query("SELECT quantity FROM product WHERE id = 1");
        $quantity = $stmt->fetchColumn();
        $this->assertEquals(0, $quantity);

        // Check if the items are added to the cart
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM cart");
        $this->assertEquals(1, $stmt->fetchColumn());

        // Check if the quantities are updated correctly in the cart
        $stmt = $this->pdo->query("SELECT quantity FROM cart WHERE user_id = 1 AND product_id = 1");
        $cartQuantity = $stmt->fetchColumn();
        $this->assertEquals(5, $cartQuantity);
    }


    public function testRemoveFromCart() {
        // Add an item to the cart for testing
        $this->pdo->exec("INSERT INTO cart (user_id, product_id, quantity) VALUES (1, 1, 2)");

        // Remove from cart
        $this->assertTrue($this->dao->removeFromCart(1));

        // Check if the cart is empty
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM cart");
        $this->assertEquals(0, $stmt->fetchColumn());
    }

    public function testRemoveFromCartByUserId() {
        // Add items to the cart for testing
        $this->pdo->exec("INSERT INTO cart (user_id, product_id, quantity) VALUES (1, 1, 2)");
        $this->pdo->exec("INSERT INTO cart (user_id, product_id, quantity) VALUES (1, 2, 3)");

        // Remove from cart
        $this->assertTrue($this->dao->removeFromCartByUserId(1));

        // Check if the cart is empty
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM cart");
        $this->assertEquals(0, $stmt->fetchColumn());
    }

    public function testRemoveFromCartByCartId() {
        // Add an item to the cart for testing
        $this->pdo->exec("INSERT INTO cart (user_id, product_id, quantity) VALUES (1, 1, 2)");

        // Remove from cart
        $this->assertTrue($this->dao->removeFromCartByCartId(1));

        // Check if the cart is empty
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM cart");
        $this->assertEquals(0, $stmt->fetchColumn());
    }

    // Add more test methods as needed for other functionalities
}

?>

