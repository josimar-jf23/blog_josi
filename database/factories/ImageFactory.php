<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'url' => 'posts/'.$this->faker->image('public/storage/posts',400,100,null,false) //w:640 H:480
        ];
        
        /*
        return[
            'url'=> $this->faker->image(null,640,480,null,true,true,null),
        ];
        */
    }
}
