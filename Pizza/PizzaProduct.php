<?php

namespace Pizza;
class PizzaProduct extends AbstractProduct {
    public function __construct($name, $size, $sauce, $conn) {
        $this->setName($name);
        $this->setSize($size);
        $this->setSauce($sauce);
        $this->setConn($conn);
        date_default_timezone_set('Europe/Minsk');
        $this->created_at = date("Y-m-d H:i:s", time());
    }

    public function getPizzaTypePrice() {
        $pizza_type = $this->getConn()->query("SELECT * FROM variety WHERE `type` = '" . $this->getConn()->real_escape_string($this->getName()) . "'");
        while($obj = $pizza_type->fetch_object()){
            return (float)$obj->price;
        }
    }

    public function getPizzaSizePrice() {
        $pizza_size = $this->getConn()->query("SELECT * FROM size_pizza WHERE `size` = '" . $this->getConn()->real_escape_string($this->getSize()) . "'");
        while($obj = $pizza_size->fetch_object()){
            return (float)$obj->price;
        }
    }

    public function getPizzaSaucePrice() {
        $pizza_sauce = $this->getConn()->query("SELECT * FROM sauce WHERE `name` = '" . $this->getConn()->real_escape_string($this->getSauce())  . "'");
        while($obj = $pizza_sauce->fetch_object()){
            return (float)$obj->price;
        }
    }

    public function getPizzaTotalPrice() {
        return $this->getPizzaTypePrice() + $this->getPizzaSizePrice() + $this->getPizzaSaucePrice();
    }
}