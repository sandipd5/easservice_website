<?php

use Illuminate\Database\Seeder;
use App\Models\Users;

class UsersTableSeeder extends Seeder
{
    protected $user;

    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user->create([
            'name' => 'Admin',
            'email' => 'info@easy.com.np',
            'password' => bcrypt('easyPassword'),
            'remember_token' => bcrypt('easyPassword'),
        ]);
    }
}
