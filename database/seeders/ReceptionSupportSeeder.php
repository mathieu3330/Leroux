<?php


namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceptionSupportSeeder extends Seeder
{
   

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'type' => 'txt,img',
        'question' => 'Détails',
        'options' =>'',
        'checklist' =>'reception support'
        ]);

    }
}
