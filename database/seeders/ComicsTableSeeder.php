<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;
use App\Functions\Helper;
use Illuminate\Support\Str;


class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');
        //
        foreach ($comics as $comic) {
            $new_comic = new Comic();
            $new_comic->title = $comic['title'];
            $new_comic->slug = Helper::generateSlug($new_comic->tile, new Comic());
            $new_comic->description = $comic['description'];
            $new_comic->thumb = $comic['thumb'];
            $new_comic->price = $comic['price'];
            $new_comic->series = $comic['series'];
            $new_comic->sale_date = $comic['sale_date'];
            $new_comic->type = $comic['type'];
            $new_comic->artists = json_encode($comic['artists']);
            $new_comic->writers = json_encode($comic['writers']);
            // dump($new_comic);
            $new_comic->save();
        }
    }
}
