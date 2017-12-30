<?php

namespace Alpha\VisitorTrackingBundle\Repository;



/**
 * Class SessionRepository
 * @package Alpha\VisitorTrackingBundle\Repository
 */
class SessionRepository extends \Doctrine\ORM\EntityRepository
{

    public function findAllByDate()
    {

        $query = $this->createQueryBuilder('s')
            ->select('count(s.ip), s.createdDate')
            ->groupBy('s.createdDate')
        ;
        return $query->getQuery()->getResult();
    }

    public function findAllByCountry()
    {

        $query = $this->createQueryBuilder('s')
            ->select('count(s.ip), s.pays')
            ->where('MONTH(s.created) = :mois ')
            ->setParameter('mois', date('m'))
            ->groupBy('s.pays')
        ;
        return $query->getQuery()->getResult();
    }


}
