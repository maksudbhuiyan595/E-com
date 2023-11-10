<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                "id"=> "1",
                "name"=> "Admin",
                "email"=> "admin@gmail.com",
                "password"=> bcrypt("654321"),
                "role"=> "admin",
                "role_id"=> "1",
            ]);

               
            User::create(
                [
                    "id"=> "2",
                    "name"=> "Manager",
                    "email"=> "manager@gmail.com",
                    "password"=> bcrypt("654321"),
                    "role"=> "manager",
                    "role_id"=> "2",
                ]);

        User::create(
            [
                "id"=> "3",
                "name"=> "Seller",
                "email"=> "seller@gmail.com",
                "password"=> bcrypt("654321"),
                "role"=> "seller",
                "role_id"=> "3",
            ]);
    }
}
