<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\DiscreteProbability;
use App\Models\ContinousProbability;
use App\Models\Prediction;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Item::seed();

        foreach(Item::$discreteAttributes as $attr => $values){
            foreach($values as $index => $value){
                DiscreteProbability::seed($attr, $value);
            }
        }

        foreach (Item::$continousAttributes as $attr) {
            ContinousProbability::seed($attr);
        }

        Prediction::seed();
    }
}
