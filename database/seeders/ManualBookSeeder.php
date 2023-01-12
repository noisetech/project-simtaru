<?php

namespace Database\Seeders;
use App\Models\Manual_book;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManualBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manual_book::create([ 
            'judul' => 'Informasi',
           'dokumen' => 'New Microsoft Word Document.pdf',
        ]);
    }
}
