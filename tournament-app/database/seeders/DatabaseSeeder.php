<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use App\Models\Team;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*Listing::factory(6)->create([
            'user_id' => $user->id,
        ]);*/


        Team::factory()->create([
            'name' => 'Football fans',
            'players_count' => "10",
            'description' => "We are group of football fans.",
            'owner_id' => "1",
        ]);

        Team::factory()->create([
            'name' => 'Tennis lovers',
            'players_count' => "2",
            'description' => "We are group of tennis fans.",
            'owner_id' => "2",
        ]);

        Team::factory()->create([
            'name' => 'Next Wimbledon Stars',
            'players_count' => "2",
            'description' => "We are group of tennis fans.",
            'owner_id' => "5",
        ]);

        Team::factory()->create([
            'name' => 'Football stars',
            'players_count' => "10",
            'description' => "We are group of football fans.",
            'owner_id' => "1",
        ]);

        Team::factory()->create([
            'name' => 'Sport lovers',
            'players_count' => "4",
            'description' => "We are group of sport fans.",
            'owner_id' => "1",
        ]);

        Team::factory()->create([
            'name' => 'Team007',
            'players_count' => "4",
            'description' => "We are group of sport fans.",
            'owner_id' => "1",
        ]);

        $user = User::factory()->create([
            'name' => 'John Doe', 
            'email' => 'john@gmail.com',
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Marek Zelený', 
            'email' => 'marek@gmail.com',
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Honza Skácel', 
            'email' => 'honza@gmail.com',
            'is_admin' => false,
        ]);

        User::factory()->create([
            'name' => 'Josef Hrnčíř', 
            'email' => 'josef@gmail.com',
            'is_admin' => false,
        ]);

        User::factory()->create([
            'name' => 'Denisa Moudrá', 
            'email' => 'denisa@gmail.com',
            'is_admin' => false,
        ]);

        Listing::create([
            'user_id' => 1,
            'title' => 'Swimming tournament',
            'date' => '2023-08-08',
            'location' => 'Městský plavecký stadion Lužánky, Brno',
            'email' => 'sport@tournament.com',
            'sport' => 'swimming',
            'conditions' => '18+',
            'max_players' => 10,
            'descriptions' => 'Relive the outstanding 19th FINA Czechoslovakia Championships hosted in Brno with best swimmers.',
            'prize' => '20000 CZK',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => false,
        ]);

        Listing::create([
            'user_id' => 1,
            'title' => 'Christmas basketball',
            'date' => '2022-12-24',
            'location' => 'Městská hala míčových sportů v Brně',
            'email' => 'sport@tournament.com',
            'sport' => 'basketball',
            'conditions' => 'girls',
            'max_players' => 10,
            'descriptions' => "Basketball is a game played between two teams of five players each on a rectangular court, usually indoors. Each team tries to score by tossing the ball through the opponent's goal, an elevated horizontal hoop and net called a basket.",
            'prize' => '20000 CZK',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => true,
        ]);

        Listing::create([
            'user_id' => 1,
            'title' => 'Christmas basketball',
            'date' => '2022-12-24',
            'location' => 'Městská hala míčových sportů v Brně',
            'email' => 'sport@tournament.com',
            'sport' => 'basketball',
            'conditions' => 'boys',
            'max_players' => 10,
            'descriptions' => "Basketball is a game played between two teams of five players each on a rectangular court, usually indoors. Each team tries to score by tossing the ball through the opponent's goal, an elevated horizontal hoop and net called a basket.",
            'prize' => '20000 CZK',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => true,
        ]);

        Listing::create([
            'user_id' => 1,
            'title' => 'Tennis game, doubles',
            'date' => '2023-11-08',
            'location' => 'SA PPV hala kurt 1 ',
            'email' => 'sport@tournament.com',
            'sport' => 'tennis',
            'conditions' => 'girls, 18+',
            'max_players' => 4,
            'descriptions' => 'In this type of tennis competition there are a total of four tennis players involved. In other words, doubles is two vs. two competition. Two tennis players combine forces to compete as a team challenging another team of two on opposite ends of the tennis court.',
            'prize' => '10000',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => true,
        ]);

        Listing::create([
            'user_id' => 1,
            'title' => 'Hockey Tournament',
            'date' => '2023-04-04',
            'location' => 'Sportcentrum Lužánky, Brno',
            'email' => 'sport@tournament.com',
            'sport' => 'hockey',
            'conditions' => 'boys',
            'max_players' => 22,
            'descriptions' => 'RThere are 11 players on a team made up of a goalkeeper, defenders, midfielders and forwards. The only player on the field who is allowed to use their feet and hands as well as their stick is the goalkeeper.',
            'prize' => '50000 CZK',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => true,
        ]);

        Listing::create([
            'user_id' => 1,
            'title' => 'School MMA',
            'date' => '2023-01-01',
            'location' => 'FIT Machina PPV, Brno',
            'email' => 'sport@tournament.com',
            'sport' => 'judo',
            'conditions' => 'boys',
            'max_players' => 8,
            'descriptions' => 'Judo is a traditional Japanese martial art that focuses on throws, trips & sweeps and includes ground techniques.',
            'prize' => '20000 CZK',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => false,
        ]);

        Listing::create([
            'user_id' => 1,
            'title' => 'Swimming tournament',
            'date' => '2023-08-08',
            'location' => 'Městský plavecký stadion Lužánky, Brno',
            'email' => 'sport@tournament.com',
            'sport' => 'swimming',
            'conditions' => 'age: 15-20',
            'max_players' => 10,
            'descriptions' => 'Relive the outstanding 19th Czechoslovakia World Championships hosted in Brno with best swimmers.',
            'prize' => '20000 CZK',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => false,
        ]);

       

        Listing::create([
            'user_id' => 1,
            'title' => 'Badminton Tournament',
            'date' => '2023-11-08',
            'location' => 'SA PPV badminton 1',
            'email' => 'sport@tournament.com',
            'sport' => 'badminton',
            'conditions' => 'girls and boys',
            'max_players' => 6,
            'descriptions' => 'Relive the outstanding 19th FINA World Championships hosted in Brno with best swimmers.',
            'prize' => 'Alza Gift Cards',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => false,
        ]);

        Listing::create([
            'user_id' => 1,
            'title' => 'Badminton Tournaments',
            'date' => '2023-11-08',
            'location' => 'SA PPV badminton 1',
            'email' => 'sport@tournament.com',
            'sport' => 'badminton',
            'conditions' => 'girls and boys',
            'max_players' => 12,
            'descriptions' => 'Relive the outstanding 19th FINA World Championships hosted in Brno with best swimmers.',
            'prize' => 'Alza Gift Cards',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => false,
        ]);

        Listing::create([
            'user_id' => 1,
            'title' => 'Christmas Ducks',
            'date' => '2023-12-24',
            'location' => 'Lake Technologický Park, Brno',
            'email' => 'sport@tournament.com',
            'sport' => 'another',
            'conditions' => '',
            'max_players' => 50,
            'descriptions' => 'Come with your friends, drink non-alcohol christmas punch and enjoy skating on frozen lake. If lake is not frozen, bring your rubber ducks, we will have rubber ducks race. Bring good mood.',
            'prize' => 'good mood for everyone',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => false,
        ]);

        Listing::create([
            'user_id' => 1,
            'title' => 'Football tournament',
            'date' => '2023-5-01',
            'location' => 'SA PPV Malá kopaná 1 - umělá tráva',
            'email' => 'sport@tournament.com',
            'sport' => 'football',
            'conditions' => 'boys',
            'max_players' => 10,
            'descriptions' => 'foot·​ball ˈfu̇t-ˌbȯl. : any of several games played between two teams on a usually rectangular field having goalposts or goals at each end and whose object is to get the ball over a goal line, into a goal, or between goalposts by running, passing, or kicking',
            'prize' => '20000 CZK',
            'website' => 'https://www.cesa.vut.cz/verejnost',
            'approved' => false,
            'collective' => false,
        ]);

        /*Listing::factory(6)->create();*/
    }
}
