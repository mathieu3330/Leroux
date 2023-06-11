<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceptionCharpenteQuestionSeeder extends Seeder
{
    private static $questionsTxtImg = ['Localiser la zone réceptionnée', 
    'Les dimensions des chevêtres sont-elles respectées ?', 
    'L’alignement des éléments de charpente permet le démarrage des travaux de couverture ?', 
    'Les souches béton sont-elles terminées ?'];


    private static $questionsOptions = ['La charpente est-elle terminée ?', 
    'Le bandeau est-il posé ?', 
    'Le bandeau est-il de niveau ?', 
    'La hauteur du bandeau est-elle respectée pour assurer la ventilation ?'];


     
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        

        Question::create([
            'type' => 'txt,img',
        'question' => 'Localiser la zone réceptionnée',
        'options' =>'',
        'checklist' =>'Reception charpente'
        ]);

        Question::create([
            'type' => 'radio,img',
        'question' => 'La charpente est-elle terminée ?',
        'options' =>'oui,non',
        'checklist' =>'Reception charpente'
        ]);

        Question::create([
            'type' => 'radio,img',
        'question' => 'Le bandeau est-il posé ?',
        'options' =>'oui,non',
        'checklist' =>'Reception charpente'
        ]);

        Question::create([
            'type' => 'radio,img',
        'question' => 'Le bandeau est-il de niveau ?',
        'options' =>'oui,non',
        'checklist' =>'Reception charpente'
        ]);

        Question::create([
            'type' => 'radio,img',
        'question' => 'La hauteur du bandeau est-elle respectée pour assurer la ventilation ?',
        'options' =>'oui,non',
        'checklist' =>'Reception charpente'
        ]);

        Question::create([
            'type' => 'radio',
        'question' => 'Les chevêtres sont-ils réalisés ?',
        'options' =>'oui,non,sansobjet',
        'checklist' =>'Reception charpente'
        ]);
        Question::create([
            'type' => 'txt,img',
        'question' => 'Les dimensions des chevêtres sont-elles respectées ?',
        'options' =>'',
        'checklist' =>'Reception charpente'
        ]);
        Question::create([
            'type' => 'txt,img',
        'question' => 'L’alignement des éléments de charpente permet le démarrage des travaux de couverture ?',
        'options' =>'',
        'checklist' =>'Reception charpente'
        ]);
        Question::create([
            'type' => 'txt,img',
        'question' => 'Les souches béton sont-elles terminées ?',
        'options' =>'',
        'checklist' =>'Reception charpente'
        ]);
        Question::create([
            'type' => 'txt,img',
        'question' => 'Les arases sont conformes ?',
        'options' =>'',
        'checklist' =>'Reception charpente'
        ]);
        Question::create([
            'type' => 'txt,img',
        'question' => 'Remarques supplémentaires',
        'options' =>'',
        'checklist' =>'Reception charpente'
        ]);
        
    }
}
