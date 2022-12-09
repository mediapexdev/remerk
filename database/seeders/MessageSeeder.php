<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Reponse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reponses = [
            [
                "user_id"=>4,
                "type"=>1,
                "reponse"=>'je vais tester message out vais tester message out vais tester message inje vais tester message inje vais tester message in'
            ],
            [
                "user_id"=>4,
                "type"=>2,
                "reponse"=>'je vais tester message out vais tester message out vais tester message inje vais tester message inje vais tester message in'
            ],
        ];
        foreach ($reponses as $reponse) {
            Reponse::create($reponse);
        }
    }
}
