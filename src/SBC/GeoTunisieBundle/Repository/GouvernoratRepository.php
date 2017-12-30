<?php

namespace SBC\GeoTunisieBundle\Repository;

/**
 * GouvernoratRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GouvernoratRepository extends \Doctrine\ORM\EntityRepository
{


    /**
     * Search gouvernorats by reg
     * @param $reg
     * @return array
     */
    public function byName($reg)
    {
        $qb = $this->createQueryBuilder('g');
        return $qb->where(
            $qb->expr()->like('g.name', ':name')
        )
            ->setParameter('name', '%' . $reg . '%')
            ->getQuery()
            ->getResult();
    }

    /**
     * return all gouvernorats
     */
    public function myfindAll($id)
    {
        $query = $this->createQueryBuilder('g')
            ->select('g, v, l, r, a')
            ->leftJoin('g.villes', 'v')
            ->leftJoin('v.localites', 'l')
            ->leftJoin('l.rues', 'r')
            ->leftJoin('r.adresses', 'a')
            ->orderBy('g.position' , 'ASC')
            ->addOrderBy('v.name' , 'ASC')
            ->where('g.id = :id')
            ->setParameter('id' , $id)
            ->getQuery();
        return $query->getArrayResult();
    }

    /**
     * return all gouvernorats
     */
    public function allGov()
    {
        $query = $this->createQueryBuilder('g')
            ->select('g')

            ->getQuery();
        return $query->getResult();
    }
}