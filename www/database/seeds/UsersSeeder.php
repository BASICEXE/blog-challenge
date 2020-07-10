<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'name' => 'テスト',
      'email' => 'nagaiwasann@gmail.com',
      'password' => bcrypt('testtest'),
    ]);
  }
}
