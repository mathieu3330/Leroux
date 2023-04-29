<?php


namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceptionTravauxSeeder extends Seeder
{
    private static $questions = ['Est-ce que la pente des gouttières est respectée ?', 
    'Est-ce que les positions des EP sont respectées ?',
    'Est-ce que les crapaudines sont posées ?',
    'Est-ce que les dilatations sont respectées ?',
    'Est-ce que la pente des gouttières est respectée ?',
    'Est-ce que le nettoyage des gouttières a été réalisé ?',
    'Est-ce que les chéneaux disposent de trop-plein ?',
    'Est-ce que les trop-pleins sont soudés correctement ?',
    'Est-ce que les moignons sont bridés contre la maçonnerie ?',
    'Est-ce que la bande d’égout est fixé avec des pattes (fixation cloues interdite) ?',
    'Est-ce que Les pattes sont correctement réparties ?',
    'Est-ce que le sertissage des bacs est correctement réalisé ?',
    'Est-ce que la pose des solins et joints est respectée ?',
    'Est-ce que les chatières sont correctement positionnées et en nombre suffisants ?',
    'Est-ce que les tuyaux sont soudés dans les chatières ?',
    'Est-ce que le faitage est posé dans le bon sens OUEST EST ?',
    'Est-ce que les sorties sont bien posées (VP/3CE/VMC/GAZ/…)',
    'Est-ce que les crochets de sécurité sont posés ?'
];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (ReceptionTravauxSeeder::$questions as $index => $question) {
            Question::create([
                'type' => 'radio,img',
            'question' => $question,
            'options' =>'oui,non',
            'checklist' =>'reception travaux'
            ]);
        }
        Question::create([
            'type' => 'txt',
        'question' => 'Evaluer la qualité des soudures (note sur 5)',
        'options' =>'',
        'checklist' =>'reception travaux'
        ]);

        Question::create([
            'type' => 'txt',
        'question' => 'Evaluer la qualité générale du travail réalisé',
        'options' =>'',
        'checklist' =>'reception travaux'
        ]);
    }
}
