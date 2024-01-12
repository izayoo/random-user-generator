<?php

namespace App\Http\Controllers;

use App\Mappers\CustomerMapper;
use App\Repositories\CustomerRepository;

class PublicController extends Controller
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;
    /**
     * @var CustomerMapper
     */
    private $mapper;

    public function __construct(CustomerRepository $customerRepository, CustomerMapper $mapper)
    {
        $this->customerRepository = $customerRepository;
        $this->mapper = $mapper;
    }

    public function getAllCustomers()
    {
        $result = $this->customerRepository->findAll();

        return response()->json([
            "data" => $this->mapper->getAll($result)
        ]);
    }

    public function getCustomerById(string $id)
    {
        $result = $this->customerRepository->findOneBy(['id' => $id]);

        return response()->json($this->mapper->get($result));
    }
}
