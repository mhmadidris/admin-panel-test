<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Laravolt\Avatar\Facade as Avatar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path('app/public/avatars/');

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true, true);
        }

        // Admin
        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
        ]);
        $userAdmin->addRole('admin');
        $avatarAdminName = 'avatar-' . $userAdmin->id . '-' . $userAdmin['name'] . '.png';
        Avatar::create($userAdmin->name)->save($path . $avatarAdminName);
        Profile::create([
            'user_id' => $userAdmin->id,
            'avatar' => 'avatars/' . $avatarAdminName,
        ]);

        // Customer
        $userCustomer = User::create([
            'name' => 'Customer',
            'email' => 'customer@mail.com',
            'password' => bcrypt('customer123'),
        ]);
        $userCustomer->addRole('customer');
        $avatarCustomerName = 'avatar-' . $userCustomer->id . '-' . $userCustomer['name'] . '.png';
        Avatar::create($userCustomer->name)->save($path . $avatarCustomerName);
        Profile::create([
            'user_id' => $userCustomer->id,
            'avatar' => 'avatars/' . $avatarCustomerName,
        ]);
    }
}