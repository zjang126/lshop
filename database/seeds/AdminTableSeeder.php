<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Admin $admin)
    {
        $admin->truncate(); // 先清空前面所有数据，重置表
        // 实例化 Faker类
        $faker = Factory::create('zh_CN'); // 设置生成中问数据
        for($i = 0; $i<=100; $i++){
            $admin->insert([
                'role_id'  => mt_rand(1,5),
                'username' => $faker->name,
                'password' => bcrypt('123456'),       // 注意一定要使用固定密码
                'email'    => $faker->email,
                'phone'    => $faker->PhoneNumber,
                'sex'      => mt_rand(1,2),
                'login_ip' => $faker->ipv4
            ]);
        }
    }
}
