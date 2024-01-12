<?php

namespace App\Mappers;

use App\Entities\Customer;

class CustomerMapper
{
    public function get(Customer $customer)
    {
        return [
            'full_name' => $customer->getFname() . ' ' . $customer->getLname(),
            'email' => $customer->getEmail(),
            'username' => $customer->getUsername(),
            'gender' => $customer->getGender(),
            'country' => $customer->getCountry(),
            'city' => $customer->getCity(),
            'phone' => $customer->getPhone()
        ];
    }

    public function getAll(array $customers) {
        return array_map(
            function ($customer) {
                return [
                    'full_name' => $customer->getFname() . ' ' . $customer->getLname(),
                    'email' => $customer->getEmail(),
                    'country' => $customer->getCountry()
                ];
            }, $customers
        );
    }
}
