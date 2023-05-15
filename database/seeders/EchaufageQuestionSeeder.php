<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EchaufageQuestionSeeder extends Seeder
{
    private static $questions = ['Les accès sont-ils dégagés ?', 
    'Les socles sont-ils positionnés correctement', 
    'Les calages présentent-ils une résistance suffisante pour recevoir et répartir les descentes de charges ?', 
    'Les cales sont-elles clouées ?', 
    'Les accès sont-ils dégagés ?', 
    'Les socles sont-ils positionnés correctement (hors regards, grilles d’arbres, pavés de verre, etc…)', 
    'La stabilité de l’ensemble est-elle assurée (Appuis, contreventements, ancrages, amarrages) ?', 
    'Les planches en bois sont-elles clouées ?', 
    'Les plinthes sont-elles installées ?', 
    'Les protections contre les chutes sont-elles installées ? (Garde-corps 1,5m)', 
    'L’état général de l’échafaudage doit être vérifier visuellement (Corrosion, usure, déformation, …)'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (EchaufageQuestionSeeder::$questions as $index => $question) {
            Question::create([
                'type' => 'radio,img',
            'question' => $question,
            'options' =>'conforme,non conforme,sans objet',
            'checklist' =>'echafaudage'
            ]);
        }

        Question::create([
            'type' => 'txt',
        'question' => 'Remarque',
        'options' =>'',
        'checklist' =>'echafaudage'
        ]);

        
    }
}
