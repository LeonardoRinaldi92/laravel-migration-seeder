<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Train;
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $cities = ['Rome', 'Milan', 'Naples', 'Turin', 'Palermo', 'Genoa'];
        for ($i = 0; $i < 20; $i++) {
            $newTrain = new Train();
            $newTrain->azienda = $faker->randomElement(['Trenitalia', 'ItalFer', 'FrecciaRossa', 'FrecciaArgento', 'Italo']);
            $newTrain->stazione_partenza = $faker->randomElement($cities);
            $newTrain->stazione_arrivo = $faker->randomElement(array_filter($cities, function($c) use ($newTrain) {return $c !== $newTrain->stazione_partenza;}));
            $newTrain->orario_partenza = $faker->time('H:i:s');
            $newTrain->orario_arrivo = $faker->dateTimeBetween($newTrain->orario_partenza, '+12 hours')->format('H:i:s');
            $newTrain->codice_treno = $faker->bothify('???#######');
            $newTrain->numero_carrozze = $faker->numberBetween(1, 12);
            $newTrain->cancellato = $faker->boolean();
            $newTrain->in_orario = $newTrain->cancellato? false : $faker->boolean();
            $newTrain->save();
        }
    }
}
