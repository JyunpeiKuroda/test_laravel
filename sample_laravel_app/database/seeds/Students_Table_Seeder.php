<?php

use Illuminate\Database\Seeder;

class Students_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          //fakerを使って、Studentsテーブルにデータを追加してみる。
        $faker = Faker\Factory::create('ja_jp');
        $now = \Carbon\Carbon::now();
        for ($i = 0; $i < 10; $i++) {
            $student = [
                'name' => $faker->name,
                'email' => $faker->email,
                'tel' => $faker->phoneNumber,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            DB::table('students')->insert($student);
        }
    }
}
