<?php

namespace Cycloo\DAO;

use Cycloo\Domain\Bike;

class BikeDAO extends DAO
{
    
    /**
     * Return a list of all Bikes, sorted by date (most recent first).
     *
     * @return array A list of all Bikes.
     */
    public function findAll() {
        $sql = "select * from t_bike order by bike_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $Bikes = array();
        foreach ($result as $row) {
            $BikeId = $row['bike_id'];
            $Bikes[$BikeId] = $this->buildDomainObject($row);
        }
        return $Bikes;
    }

    /**
     * Creates an Bike object based on a DB row.
     *
     * @param array $row The DB row containing Bike data.
     * @return \Cycloo\Domain\Bike
     */
    protected function buildDomainObject($row) {
        $Bike = new Bike();
        $Bike->setId($row['bike_id']);
        $Bike->setName($row['bike_name']);
        $Bike->setDescription($row['bike_description']);
        return $Bike;
    }
    
    /**
     * Returns an Bike matching the supplied id.
     *
     * @param integer $id
     *
     * @return \Cycloo\Domain\Bike|throws an exception if no matching Bike is found
     */
    public function find($id) {
        $sql = "select * from t_Bike where bike_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No Bike matching id " . $id);
    }
}