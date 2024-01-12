<?php

namespace App\Console\Commands;

use App\Services\ImportRandomUsers;
use Illuminate\Console\Command;

class FetchRandomUserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:random-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch User Data from Third-party API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ImportRandomUsers $importRandomUsers)
    {
        $data = json_decode($importRandomUsers->fetchUsers());

        foreach ($data->results as $result) {
            $importRandomUsers->saveAsCustomer($importRandomUsers->formatToCustomerData($result));
        }

        return true;
    }
}
