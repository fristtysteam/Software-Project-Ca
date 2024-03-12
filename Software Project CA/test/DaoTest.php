<?php

use PHPUnit\Framework\TestCase;

require_once '../dao/dao.php';

class DAOTest extends TestCase {
    private $dao;

    protected function setUp(): void {
        $this->dao = new DAO();
    }

    public function testDBConnection() {
        $this->assertInstanceOf(PDO::class, $this->dao->db);
    }


}

