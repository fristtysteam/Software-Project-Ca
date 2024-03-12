<?php

use PHPUnit\Framework\TestCase;

require_once '../dao/productDao.php';

class ProductDaoTest extends TestCase {
    private $dao;
    private $pdo;

    protected function setUp(): void {
        // Establish a PDO connection to an in-memory SQLite database for testing
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the necessary table for testing
        $this->pdo->exec("
            CREATE TABLE product (
                id INTEGER PRIMARY KEY,
                name VARCHAR(255),
                price DECIMAL(10,2),
                quantity INT,
                url VARCHAR(255),
                description TEXT
            )
        ");

        // Initialize the DAO with the PDO instance
        $this->dao = new ProductDao($this->pdo);
    }

    public function testAddProduct() {
        // Call the method being tested
        $result = $this->dao->addProduct('Product 1', 10.99, 5, 'http://example.com', 'Description 1');

        // Assertions
        $this->assertTrue($result);

        // Check if the product is actually inserted into the database
        $products = $this->dao->getProducts();
        $this->assertCount(1, $products);
        $this->assertEquals('Product 1', $products[0]['name']);
    }

    public function testUpdateProduct() {
        // Insert a product into the database
        $this->pdo->exec("INSERT INTO product (name, price, quantity, url, description) 
                          VALUES ('Existing Product', 20.50, 3, 'http://example.com', 'Description')");

        // Call the method being tested
        $result = $this->dao->updateProduct(1, 'Updated Product', 15.99, 10, 'http://updated.com', 'Updated Description');

        // Assertions
        $this->assertTrue($result);

        // Check if the product is actually updated in the database
        $product = $this->dao->getProductById(1);
        $this->assertEquals('Updated Product', $product['name']);
        $this->assertEquals(15.99, $product['price']);
        $this->assertEquals(10, $product['quantity']);
        $this->assertEquals('http://updated.com', $product['url']);
        $this->assertEquals('Updated Description', $product['description']);
    }

    public function testGetProducts() {
        // Insert some products into the database
        $this->pdo->exec("INSERT INTO product (name, price, quantity, url, description) 
                          VALUES ('Product 1', 10.99, 5, 'http://example.com', 'Description 1')");
        $this->pdo->exec("INSERT INTO product (name, price, quantity, url, description) 
                          VALUES ('Product 2', 20.50, 8, 'http://example.com', 'Description 2')");

        // Call the method being tested
        $products = $this->dao->getProducts();

        // Assertions
        $this->assertCount(2, $products);
        $this->assertEquals('Product 1', $products[0]['name']);
        $this->assertEquals('Product 2', $products[1]['name']);
    }

    public function testDeleteProduct() {
        // Insert a product into the database
        $this->pdo->exec("INSERT INTO product (name, price, quantity, url, description) 
                          VALUES ('Product to delete', 10.99, 5, 'http://example.com', 'Description')");

        // Call the method being tested
        $result = $this->dao->deleteProduct(1);

        // Assertions
        $this->assertTrue($result);

        // Check if the product is actually deleted from the database
        $products = $this->dao->getProducts();
        $this->assertCount(0, $products);
    }
}

?>

