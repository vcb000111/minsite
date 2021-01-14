<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('cates')->delete();

        DB::table('cates')->insert(array(
            0 =>
            array(
                'id' => 1,
                'cate_name' => 'Drama',
                'created_at' => '2021-01-06 01:15:40',
                'updated_at' => '2021-01-06 01:15:40',
            ),
            1 =>
            array(
                'id' => 2,
                'cate_name' => 'No-drama',
                'created_at' => '2021-01-06 01:16:11',
                'updated_at' => '2021-01-06 01:16:11',
            ),
            2 =>
            array(
                'id' => 3,
                'cate_name' => '1-shot',
                'created_at' => '2021-01-06 01:16:20',
                'updated_at' => '2021-01-06 01:16:20',
            ),
            3 =>
            array(
                'id' => 4,
                'cate_name' => 'Lesbian',
                'created_at' => '2021-01-06 01:16:28',
                'updated_at' => '2021-01-06 01:16:28',
            ),
            4 =>
            array(
                'id' => 5,
                'cate_name' => 'Wall, desk, chair',
                'created_at' => '2021-01-06 01:16:38',
                'updated_at' => '2021-01-06 01:16:38',
            ),
            5 =>
            array(
                'id' => 6,
                'cate_name' => 'Other-uncen',
                'created_at' => '2021-01-06 01:16:50',
                'updated_at' => '2021-01-06 01:16:50',
            ),
            6 =>
            array(
                'id' => 7,
                'cate_name' => 'Other-cen',
                'created_at' => '2021-01-06 01:16:59',
                'updated_at' => '2021-01-06 01:16:59',
            ),
        ));
    }
}
