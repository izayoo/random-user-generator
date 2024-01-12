<?php

namespace App\Services;

use App\Entities\Customer;
use App\Repositories\CustomerRepository;

class ImportRandomUsers
{
    /**
     * @var CustomerRepository
     */
    private $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function fetchUsers()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://randomuser.me/api?results=100&nat=au',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function formatToCustomerData(object $data)
    {
        $record = $this->repository->findOneBy(['email' => $data->email]);

        if ($record) {
            $record->setFname($data->name->first);
            $record->setLname($data->name->last);
            $record->setUsername($data->login->username);
            $record->setPassword($data->login->password);
            $record->setGender($data->gender);
            $record->setCountry($data->location->country);
            $record->setCity($data->location->city);
            $record->setPhone($data->phone);

            return $record;
        }

        return new Customer(
            $data->name->first,
            $data->name->last,
            $data->email,
            $data->login->username,
            $data->login->password,
            $data->gender,
            $data->location->country,
            $data->location->city,
            $data->phone
        );
    }

    public function saveAsCustomer(Customer $customer)
    {
        return $this->repository->save($customer);
    }
}
