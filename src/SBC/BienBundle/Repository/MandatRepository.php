<?php

namespace SBC\BienBundle\Repository;


/**
 * MandatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MandatRepository extends \Doctrine\ORM\EntityRepository
{

//    public function findAll($rueID = null, $etatMandat = null)
//    {
//
//        $query = $this->createQueryBuilder('mandat')
//            ->leftJoin('mandat.acquisition', 'acquisition')
//            ->addSelect('acquisition')
//
//            ->leftJoin('mandat.promotions', 'promotions')
//            ->addSelect('promotions')
//
//            ->leftJoin('acquisition.bien', 'bien')
//            ->addSelect('bien')
//            ->leftJoin('bien.address', 'address')
//            ->addSelect('address')
//
//            ->leftJoin('bien.typeBien', 'type_bien')
//            ->addSelect('type_bien')
//            ->leftJoin('mandat.typeMandat', 'typeMandat')
//            ->addSelect('typeMandat')
//
//            ->orderBy('mandat.creationDate','DESC')
//  ;
//        // return for JSON
//        if ($rueID != null) {
//            $query->andWhere('address.rue = :id')->setParameter('id', $rueID);
//            return $query->getQuery()->getArrayResult();
//        }
//        if ($etatMandat != null) {
//            $query->andWhere('mandat.etatMandat = :etatMandat')->setParameter('etatMandat',$etatMandat);
//
//        }
//        // return for list
//        return $query->getQuery()->getResult();
//
//    }

//    public function find($id, $lockMode = null, $lockVersion = null)
//    {
////        die(var_dump('here'));
//        $query = $this->createQueryBuilder('mandat')
//            ->leftJoin('mandat.taches', 'taches')
//            ->addSelect('taches')
//            ->leftJoin('taches.typeTache', 'type_tache')
//            ->addSelect('type_tache')
//
//            ->leftJoin('mandat.mandatParent', 'mandatParent')
//            ->addSelect('mandatParent')
//
//            ->leftJoin('mandat.acquisition', 'acquisition')
//            ->addSelect('acquisition')
//
//            ->leftJoin('mandat.promotions', 'promotions')
//            ->addSelect('promotions')
//
//            ->leftJoin('acquisition.bien', 'bien')
//            ->addSelect('bien')
//
//            ->leftJoin('bien.owners', 'owners')
//            ->addSelect('owners')
//            ->leftJoin('owners.client', 'client')
//            ->addSelect('client')
////            ->leftJoin('bien.representants', 'representants')
////            ->addSelect('representants')
////            ->leftJoin('representants.client', 'clientt')
////            ->addSelect('clientt')
////            ->leftJoin('representants.representant', 'representant')
////            ->addSelect('representant')
//            ->leftJoin('bien.procurations', 'procurations')
//            ->addSelect('procurations')
//            ->leftJoin('procurations.client', 'clienttt')
//            ->addSelect('clienttt')
//            ->leftJoin('procurations.representant', 'representantt')
//            ->addSelect('representantt')
//
//            ->leftJoin('bien.address', 'address')
//            ->addSelect('address')
//            ->leftJoin('address.rue', 'rue')
//            ->addSelect('rue')
//            ->leftJoin('rue.localite', 'localite')
//            ->addSelect('localite')
//            ->leftJoin('localite.ville', 'ville')
//            ->addSelect('ville')
//            ->leftJoin('ville.gouvernorat', 'gouvernorat')
//            ->addSelect('gouvernorat')
//
//            ->leftJoin('bien.createdBy', 'createdBy')
//            ->addSelect('createdBy')
//            ->leftJoin('bien.agency', 'agency')
//            ->addSelect('agency')
//
//            ->leftJoin('mandat.typeMandat', 'typeMandat')
//            ->addSelect('typeMandat')
//
//            ->leftJoin('mandat.meetings', 'meetings')
//            ->addSelect('meetings')
//            ->leftJoin('meetings.remindFors', 'remind_for')
//            ->addSelect('remind_for')
//
//            ->leftJoin('mandat.offres', 'offres')
//            ->addSelect('offres')
//            ->leftJoin('offres.createdBy', 'offrecreatedby')
//            ->addSelect('offrecreatedby')
//            ->leftJoin('offres.proposedBy', 'offreproposedby')
//            ->addSelect('offreproposedby')
//
//            ->leftJoin('mandat.visites', 'visites')
//            ->addSelect('visites')
//
//            ->leftJoin('visites.client', 'clien')
//            ->addSelect('clien')
//            ->leftJoin('visites.createdBy', 'created_by')
//            ->addSelect('created_by')
//            ->leftJoin('visites.remindFors', 'remind_fors')
//            ->addSelect('remind_fors')
//
//            ->where('mandat.id = ?1')
//            ->getQuery();
//
//        $query->setParameters(array(1 => $id));
//
//        return $query->getOneOrNullResult();
//    }
}
