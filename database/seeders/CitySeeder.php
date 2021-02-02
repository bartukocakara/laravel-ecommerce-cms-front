<?php

namespace Database\Seeders;

use App\Models\City;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insert([
            array('id' => '1','name' => 'Adana'),
            array('id' => '2','name' => 'Adıyaman'),
            array('id' => '3','name' => 'Afyonkarahisar'),
            array('id' => '4','name' => 'Ağrı'),
            array('id' => '5','name' => 'Amasya'),
            array('id' => '6','name' => 'Ankara'),
            array('id' => '7','name' => 'Antalya'),
            array('id' => '8','name' => 'Artvin'),
            array('id' => '9','name' => 'Aydın'),
            array('id' => '10','name' => 'Balıkesir'),
            array('id' => '11','name' => 'Bilecik'),
            array('id' => '12','name' => 'Bingöl'),
            array('id' => '13','name' => 'Bitlis'),
            array('id' => '14','name' => 'Bolu'),
            array('id' => '15','name' => 'Burdur'),
            array('id' => '16','name' => 'Bursa'),
            array('id' => '17','name' => 'Çanakkale'),
            array('id' => '18','name' => 'Çankırı'),
            array('id' => '19','name' => 'Çorum'),
            array('id' => '20','name' => 'Denizli'),
            array('id' => '21','name' => 'Diyarbakır'),
            array('id' => '22','name' => 'Edirne'),
            array('id' => '23','name' => 'Elâzığ'),
            array('id' => '24','name' => 'Erzincan'),
            array('id' => '25','name' => 'Erzurum'),
            array('id' => '26','name' => 'Eskişehir'),
            array('id' => '27','name' => 'Gaziantep'),
            array('id' => '28','name' => 'Giresun'),
            array('id' => '29','name' => 'Gümüşhane'),
            array('id' => '30','name' => 'Hakkâri'),
            array('id' => '31','name' => 'Hatay'),
            array('id' => '32','name' => 'Isparta'),
            array('id' => '33','name' => 'Mersin'),
            array('id' => '34','name' => 'İstanbul'),
            array('id' => '35','name' => 'İzmir'),
            array('id' => '36','name' => 'Kars'),
            array('id' => '37','name' => 'Kastamonu'),
            array('id' => '38','name' => 'Kayseri'),
            array('id' => '39','name' => 'Kırklareli'),
            array('id' => '40','name' => 'Kırşehir'),
            array('id' => '41','name' => 'Kocaeli'),
            array('id' => '42','name' => 'Konya'),
            array('id' => '43','name' => 'Kütahya'),
            array('id' => '44','name' => 'Malatya'),
            array('id' => '45','name' => 'Manisa'),
            array('id' => '46','name' => 'Kahramanmaraş'),
            array('id' => '47','name' => 'Mardin'),
            array('id' => '48','name' => 'Muğla'),
            array('id' => '49','name' => 'Muş'),
            array('id' => '50','name' => 'Nevşehir'),
            array('id' => '51','name' => 'Niğde'),
            array('id' => '52','name' => 'Ordu'),
            array('id' => '53','name' => 'Rize'),
            array('id' => '54','name' => 'Sakarya'),
            array('id' => '55','name' => 'Samsun'),
            array('id' => '56','name' => 'Siirt'),
            array('id' => '57','name' => 'Sinop'),
            array('id' => '58','name' => 'Sivas'),
            array('id' => '59','name' => 'Tekirdağ'),
            array('id' => '60','name' => 'Tokat'),
            array('id' => '61','name' => 'Trabzon'),
            array('id' => '62','name' => 'Tunceli'),
            array('id' => '63','name' => 'Şanlıurfa'),
            array('id' => '64','name' => 'Uşak'),
            array('id' => '65','name' => 'Van'),
            array('id' => '66','name' => 'Yozgat'),
            array('id' => '67','name' => 'Zonguldak'),
            array('id' => '68','name' => 'Aksaray'),
            array('id' => '69','name' => 'Bayburt'),
            array('id' => '70','name' => 'Karaman'),
            array('id' => '71','name' => 'Kırıkkale'),
            array('id' => '72','name' => 'Batman'),
            array('id' => '73','name' => 'Şırnak'),
            array('id' => '74','name' => 'Bartın'),
            array('id' => '75','name' => 'Ardahan'),
            array('id' => '76','name' => 'Iğdır'),
            array('id' => '77','name' => 'Yalova'),
            array('id' => '78','name' => 'Karabük'),
            array('id' => '79','name' => 'Kilis'),
            array('id' => '80','name' => 'Osmaniye'),
            array('id' => '81','name' => 'Düzce')
        ]);
    }
}
