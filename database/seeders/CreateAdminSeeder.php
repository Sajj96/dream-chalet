<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = User::firstOrNew(['email'=>'admin@example.com']);
        $super_admin->name         = 'Super';
        $super_admin->mobile  = '+255717000000';
        $super_admin->password     = Hash::make('Admin123');
        $super_admin->status       = User::USER_VERIFIED;
        $super_admin->user_type    = User::ADMIN_USER;
        $super_admin->save();
    }
}
