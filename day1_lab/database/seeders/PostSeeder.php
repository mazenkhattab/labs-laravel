<?php

namespace Database\Seeders;

use App\Models\post;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        \App\Models\post::factory()->create([
                'title' => 'Test User',
                'description' => 'test description',
                'user_id' => '1',
            ]);
    }
}
