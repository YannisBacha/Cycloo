<?php

namespace Cycloo\Domain;

class Bike
{
    /**
     * Bike id.
     *
     * @var integer
     */
    private $id;

    /**
     * Bike name.
     *
     * @var string
     */
    private $name;

    /**
     * Bike description.
     *
     * @var string
     */
    private $description;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getname() {
        return $this->name;
    }

    public function setname($name) {
        $this->name = $name;
    }

    public function getdescription() {
        return $this->description;
    }

    public function setdescription($description) {
        $this->description = $description;
    }
}