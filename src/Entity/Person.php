<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Person
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", name="person_id")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
