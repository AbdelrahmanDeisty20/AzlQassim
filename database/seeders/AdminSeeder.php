<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@azlqassim.com'],
            [
                'name'     => 'admin',
                'email'    => 'admin@azlqassim.com',
                'password' => Hash::make('11223344'),
            ]
        );

        $this->command->info('✅ Admin user created: username = admin | password = 11223344');
    }
}
