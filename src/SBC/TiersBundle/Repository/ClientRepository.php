<?php

namespace SBC\TiersBundle\Repository;

use SBC\TiersBundle\Entity\Client;

/**
 * ClientRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientRepository extends TiersRepository
{
    /**
     * Overriding Entity Manager's find by id function
     * This function accept $code (string) instead of $id (integer)
     * @param mixed $code
     * @param null $lockMode
     * @param null $lockVersion
     * @return null|Client
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function find($code, $lockMode = null, $lockVersion = null)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('c, ma, ad, cnt')
            ->join('c.mainAddress', 'ma')
            ->leftJoin('c.addresses', 'ad')
            ->leftJoin('c.contacts', 'cnt')
            ->where('c.code = :code')
            ->setParameter('code', $code)
        ;
        return $qb->getQuery()->getOneOrNullResult();
    }




}