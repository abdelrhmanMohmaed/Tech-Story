<?php

namespace TechStory\Classes\Models;

use  TechStory\Classes\Db;

class Order extends Db
{
    public function __construct()
    {
        $this->table = "orders";
        $this->connect();
    }

    public function selectAll(string $fields = "*"): array
    {
        $sql = "SELECT $fields FROM $this->table JOIN order_details JOIN products
        ON $this->table.id =order_details.order_id
        AND products.id=order_details.product_id
        GROUP BY $this->table.id";
        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function selectId($id, string $fields = '*')
    {
        $sql = "SELECT $fields FROM $this->table JOIN order_details JOIN products
              ON orders.id= order_details.order_id 
              AND order_details.product_id = products.id  
              WHERE $this->table.id = $id";
        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_assoc($result);
    }
}
// SELECT orders.*,order_details.qty,products.name AS productName ,products.price FROM `orders` JOIN products JOIN order_details
// ON orders.id= order_details.id 
// AND order_details.product_id =products.id  