<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PersonInBuilding
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $moveIn;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     * @ORM\JoinColumn(name="PersonId", referencedColumnName="person_id", nullable=false)
     */
    private $person;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Building")
     * @ORM\JoinColumn(name="BuildingId", referencedColumnName="building_id", nullable=false)
     */
    private $building;

    public function __construct(Person $person, Building $building)
    {
        $this->person = $person;
        $this->building = $building;
    }
}
