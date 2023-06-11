<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    private static $emails = ['olmariouh@leroux-couverture.fr', 
    'thomas@leroux-couverture.fr', 
    'accueil@leroux-couverture.fr', 
    'clapenna@leroux-couverture.fr', 
    'fraoult@leroux-couverture.fr', 
    'akone@leroux-couverture.fr', 
    'jfontelline@leroux-couverture.fr', 
    'kvarandas@leroux-couverture.fr', 
    'smarchand@leroux-couverture.fr', 
    'toliveira@leroux-couverture.fr', 
    'amouzarine@leroux-couverture.fr', 
    'nyagiz@leroux-couverture.fr', 
    'llemuhot@leroux-couverture.fr',
    'mbertin@leroux-couverture.fr'];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('site.leroux');

        foreach (DatabaseSeeder::$emails as $index => $email) {
            User::create([
                'name' => explode('@', $email)[0],
                'email' => $email,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => $password,
            ]);
        }
        $this->call(EchaufageQuestionSeeder::class);
        $this->call(ReceptionCharpenteQuestionSeeder::class);
        $this->call(ReceptionSupportSeeder::class);
        $this->call(ReceptionTravauxSeeder::class);
    }
}
