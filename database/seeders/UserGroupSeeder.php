<?php

namespace Database\Seeders;

use App\Models\UserGroupModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserGroupModel::create([
            'name' => 'ADMIN',
        ]);
    }
}
