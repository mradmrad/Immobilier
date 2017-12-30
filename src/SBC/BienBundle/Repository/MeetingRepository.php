<?php

namespace SBC\BienBundle\Repository;


/**
 * MeetingRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MeetingRepository extends \Doctrine\ORM\EntityRepository
{

    public function findAll()
    {
        $query = $this->createQueryBuilder('meeting')
            ->leftJoin('meeting.remindFors', 'remindFors')
            ->addSelect('remindFors')
            ->leftJoin('meeting.client', 'client')
            ->addSelect('client')
            ->leftJoin('meeting.createdBy', 'createdby')
            ->addSelect('createdby')
            ->getQuery();

        return $query
            ->getResult();
    }
}
