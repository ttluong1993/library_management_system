<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            // Book
            [
                'name' => 'book.index',
                'display_name' => '',
            ],

            [
                'name' => 'book.create',
                'display_name' => '',
            ],

            [
                'name' => 'book.store',
                'display_name' => '',
            ],

            [
                'name' => 'book.show',
                'display_name' => '',
            ],

            [
                'name' => 'book.edit',
                'display_name' => '',
            ],

            [
                'name' => 'book.update',
                'display_name' => '',
            ],

            [
                'name' => 'book.destroy',
                'display_name' => '',
            ],

            // Book Copy
            [
                'name' => 'book.copy.create',
                'display_name' => '',
            ],

            [
                'name' => 'book.copy.store',
                'display_name' => '',
            ],
        ]);
    }
}
