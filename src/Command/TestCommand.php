<?php
declare(strict_types=1);

namespace App\Command;

use App\Entity\Address;
use App\Entity\Building;
use App\Entity\Company;
use App\Entity\PersonInBuilding;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    public static $defaultName = 'app:test';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @inheritDoc
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();

        $this->em = $em;
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select(['bldg'])
            ->from(PersonInBuilding::class, 'pib')
            ->join(Building::class, 'bldg', Join::WITH, 'pib.building = bldg')
            //->groupBy('bldg.id') // uncomment and it will be fixed
        ;


        foreach ($qb->getQuery()->iterate() as $r) {
            dump($r[0]->getName());
        }
    }
}
