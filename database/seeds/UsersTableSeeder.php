<?php
use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 23;
        for ($i=0; $i < $limit ; $i++) { 
            DB::table('users')->insert([
                'badge' => '1001',
                'emp_name' => $faker->name,
                'email' => $faker->unique()->companyEmail,
                'password' => bcrypt('secret'),
                'leave_bal' => '24',
                'role' => 'regular',
                'emp_status' => 'active',
            ]);
        }
    }
}