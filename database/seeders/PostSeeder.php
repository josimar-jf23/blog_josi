<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $posts= Post::factory(100)->create();
       foreach ($posts as $post) {           
           $imag=Image::factory(1)->create([
               'imageable_id'=>$post->id,
               'imageable_type'=>Post::class,
           ]);
           //dd($imag);
           //para llenar la tabla de la relaccion muchos a muchos  usar atach
           $post->tags()->attach([
               rand(1,4),
               rand(5,8)
           ]);
       }
    }
}
