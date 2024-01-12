<?php

namespace App\Repositories;

use App\Entities\Customer;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Exception;

class CustomerRepository extends EntityRepository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(Customer::class));
    }

    /**
     * @throws Exception
     */
    public function save(Customer $customer)
    {
        $this->getEntityManager()->beginTransaction();
        try {
            $this->getEntityManager()->persist($customer);
            $this->getEntityManager()->commit();
            $this->getEntityManager()->flush();

            return $customer;
        } catch (Exception $ex) {
            $this->getEntityManager()->rollback();
            throw $ex;
        }
    }
}
