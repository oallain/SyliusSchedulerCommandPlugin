<?php

declare(strict_types=1);

namespace Synolia\SyliusSchedulerCommandPlugin\Repository;

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Synolia\SyliusSchedulerCommandPlugin\Entity\ScheduledCommand;
use Synolia\SyliusSchedulerCommandPlugin\Entity\ScheduledCommandInterface;

/**
 * @method ScheduledCommand|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScheduledCommand|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScheduledCommand[]    findAll()
 * @method ScheduledCommand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScheduledCommandRepository extends EntityRepository implements ScheduledCommandRepositoryInterface
{
    /**
     * @return ScheduledCommandInterface[]
     */
    public function findEnabledCommand(): iterable
    {
        return $this->findBy(['enabled' => true], ['priority' => 'DESC']);
    }
}
