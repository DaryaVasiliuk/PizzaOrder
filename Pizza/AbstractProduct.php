<?php

namespace Pizza;
abstract class AbstractProduct
{
    public $name,
           $price,
           $size,
           $created_at,
           $sauce,
           $conn;


    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getSize() {
        return $this->size;
    }

    public function getSauce() {
        return $this->sauce;
    }

    public function getConn() {
        return $this->conn;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function setSize(int $size) : void {
        $this->size = $size;
    }

    public function setSauce(string $sauce) : void {
        $this->sauce = $sauce;
    }

    public function setConn($conn) : void {
        $this->conn = $conn;
    }
}
