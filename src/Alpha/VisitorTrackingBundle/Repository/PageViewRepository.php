<?php

namespace Alpha\VisitorTrackingBundle\Repository;

use Alpha\VisitorTrackingBundle\Entity\PageView;
use Doctrine\ORM\Query\ResultSetMapping;


/**
 * Class PageViewRepository
 * @package Alpha\VisitorTrackingBundle\Repository
 */
class PageViewRepository extends \Doctrine\ORM\EntityRepository
{


    public function findAllGroupByUrl()
    {

        $query = $this->createQueryBuilder('p')
            ->select('count(p.id), p.url')
            ->groupBy('p.url');
        return $query->getQuery()->getResult();
    }


    public function findAllGroupByUrlAndPays()
    {
        $sql = " SELECT page_v.url, s.pays, count(page_v.id) from session s left JOIN page_view page_v ON s.id = page_v.session_id group by s.pays, page_v.url";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute();


        return $stmt->fetchAll();

    }


}
