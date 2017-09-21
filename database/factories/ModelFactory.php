<?php
use Faker\Factory;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    static $password;
//
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
//    ];
//});

//在模型工厂中声明我们要创建的数据代码
$factory->define(App\Models\Admin::class, function (Faker\Generator $faker) {
    $faker = Factory::create('zh_CN'); // 设置生成中问数据
    static $password;
    return [
        'role_id'  => mt_rand(1,5),
        'username' => $faker->name,
        'email'    => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'phone'    => $faker->unique()->phoneNumber,
        'sex'      => mt_rand(1,2),
        'login_ip' => $faker->ipv4
    ];
});
