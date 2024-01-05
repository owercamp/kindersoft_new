<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Country::create([
      'name' => 'Afganistán',
      'iso' => 'AFG / AF',
      'capital' => 'Kabul',
      'code_country' => '93',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Armenia',
      'iso' => 'ARM / AM',
      'capital' => 'Yerevan',
      'code_country' => '374',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Azerbaiyán',
      'iso' => 'AZE / AZ',
      'capital' => 'Baku',
      'code_country' => '994',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Bangladesh',
      'iso' => 'BGD / BD',
      'capital' => 'Dhaka',
      'code_country' => '880',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Bután',
      'iso' => 'BTN / BT',
      'capital' => 'Thimphu',
      'code_country' => '975',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Brunei',
      'iso' => 'BRN / BN',
      'capital' => 'Bandar Seri Begawan',
      'code_country' => '673',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Camboya',
      'iso' => 'KHM / KH',
      'capital' => 'Phnom Penh',
      'code_country' => '855',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'China',
      'iso' => 'CHN / CN',
      'capital' => 'Beijing',
      'code_country' => '86',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Timor Oriental',
      'iso' => 'TLS / TL',
      'capital' => 'Dili',
      'code_country' => '670',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Hong Kong',
      'iso' => 'HKG / HK',
      'capital' => 'Hong Kong',
      'code_country' => '852',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'India',
      'iso' => 'IND / IN',
      'capital' => 'New Delhi',
      'code_country' => '91',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Indonesia',
      'iso' => 'IDN / ID',
      'capital' => 'Jakarta',
      'code_country' => '62',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Japón',
      'iso' => 'JPN / JP',
      'capital' => 'Tokyo',
      'code_country' => '81',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Kazajstán',
      'iso' => 'KAZ / KZ',
      'capital' => 'Astana',
      'code_country' => '7',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Kirguistán',
      'iso' => 'KGZ / KG',
      'capital' => 'Bishkek',
      'code_country' => '996',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Laos',
      'iso' => 'LAO / LA',
      'capital' => 'Vientiane',
      'code_country' => '856',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Macao',
      'iso' => 'MAC / MO',
      'capital' => 'Macao',
      'code_country' => '853',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Malasia',
      'iso' => 'MYS / MY',
      'capital' => 'Kuala Lumpur',
      'code_country' => '60',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Maldivas',
      'iso' => 'MDV / MV',
      'capital' => 'Male',
      'code_country' => '960',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Mongolia',
      'iso' => 'MNG / MN',
      'capital' => 'Ulan Bator',
      'code_country' => '976',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Birmania (Myanmar)',
      'iso' => 'MMR / MM',
      'capital' => 'Nay Pyi Taw',
      'code_country' => '95',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Nepal',
      'iso' => 'NPL / NP',
      'capital' => 'Kathmandu',
      'code_country' => '977',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Corea del Norte',
      'iso' => 'PRK / KP',
      'capital' => 'Pyongyang',
      'code_country' => '850',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Pakistán',
      'iso' => 'PAK / PK',
      'capital' => 'Islamabad',
      'code_country' => '92',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Filipinas',
      'iso' => 'PHL / PH',
      'capital' => 'Manila',
      'code_country' => '63',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Singapur',
      'iso' => 'SGP / SG',
      'capital' => 'Singapore',
      'code_country' => '65',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Corea del Sur',
      'iso' => 'KOR / KR',
      'capital' => 'Seoul',
      'code_country' => '82',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Sri Lanka',
      'iso' => 'LKA / LK',
      'capital' => 'Colombo',
      'code_country' => '94',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Taiwán',
      'iso' => 'TWN / TW',
      'capital' => 'Taipei',
      'code_country' => '886',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Tadjikistan',
      'iso' => 'TJK / TJ',
      'capital' => 'Dushanbe',
      'code_country' => '992',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Tailandia',
      'iso' => 'THA / TH',
      'capital' => 'Bangkok',
      'code_country' => '66',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Turkmenistan',
      'iso' => 'TKM / TM',
      'capital' => 'Ashgabat',
      'code_country' => '993',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Uzbekistán',
      'iso' => 'UZB / UZ',
      'capital' => 'Tashkent',
      'code_country' => '998',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Vietnam',
      'iso' => 'VNM / VN',
      'capital' => 'Hanoi',
      'code_country' => '84',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Andorra',
      'iso' => 'AND / AD',
      'capital' => 'Andorra la Vella',
      'code_country' => '376',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Antártida',
      'iso' => 'ATA / AQ',
      'capital' => '',
      'code_country' => '672',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Austria',
      'iso' => 'AUT / AT',
      'capital' => 'Vienna',
      'code_country' => '43',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Bélgica',
      'iso' => 'BEL / BE',
      'capital' => 'Brussels',
      'code_country' => '32',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Territorio Británico del Océano Índico',
      'iso' => 'IOT / IO',
      'capital' => 'Diego Garcia',
      'code_country' => '246',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Dinamarca',
      'iso' => 'DNK / DK',
      'capital' => 'Copenhagen',
      'code_country' => '45',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Faroe',
      'iso' => 'FRO / FO',
      'capital' => 'Torshavn',
      'code_country' => '298',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Finlandia',
      'iso' => 'FIN / FI',
      'capital' => 'Helsinki',
      'code_country' => '358',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Francia',
      'iso' => 'FRA / FR',
      'capital' => 'Paris',
      'code_country' => '33',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Alemania',
      'iso' => 'DEU / DE',
      'capital' => 'Berlin',
      'code_country' => '49',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Gibraltar',
      'iso' => 'GIB / GI',
      'capital' => 'Gibraltar',
      'code_country' => '350',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Grecia',
      'iso' => 'GRC / GR',
      'capital' => 'Athens',
      'code_country' => '30',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Guernsey',
      'iso' => 'GGY / GG',
      'capital' => 'St Peter Port',
      'code_country' => '44-1481',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islandia',
      'iso' => 'ISL / IS',
      'capital' => 'Reykjavik',
      'code_country' => '354',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Irlanda',
      'iso' => 'IRL / IE',
      'capital' => 'Dublin',
      'code_country' => '353',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Isla de Man',
      'iso' => 'IMN / IM',
      'capital' => 'Douglas, Isle of Man',
      'code_country' => '44-1624',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Italia',
      'iso' => 'ITA / IT',
      'capital' => 'Rome',
      'code_country' => '39',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Jersey',
      'iso' => 'JEY / JE',
      'capital' => 'Saint Helier',
      'code_country' => '44-1534',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Kosovo',
      'iso' => 'XKX / XK',
      'capital' => 'Pristina',
      'code_country' => '383',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Liechtenstein',
      'iso' => 'LIE / LI',
      'capital' => 'Vaduz',
      'code_country' => '423',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Luxemburgo',
      'iso' => 'LUX / LU',
      'capital' => 'Luxembourg',
      'code_country' => '352',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Malta',
      'iso' => 'MLT / MT',
      'capital' => 'Valletta',
      'code_country' => '356',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Mónaco',
      'iso' => 'MCO / MC',
      'capital' => 'Monaco',
      'code_country' => '377',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Montserrat',
      'iso' => 'MSR / MS',
      'capital' => 'Plymouth',
      'code_country' => '1-664',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Países Bajos',
      'iso' => 'NLD / NL',
      'capital' => 'Amsterdam',
      'code_country' => '31',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Antillas Neerlandesas',
      'iso' => 'ANT / AN',
      'capital' => 'Willemstad',
      'code_country' => '599',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Noruega',
      'iso' => 'NOR / NO',
      'capital' => 'Oslo',
      'code_country' => '47',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Portugal',
      'iso' => 'PRT / PT',
      'capital' => 'Lisbon',
      'code_country' => '351',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'San Marino',
      'iso' => 'SMR / SM',
      'capital' => 'San Marino',
      'code_country' => '378',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'España',
      'iso' => 'ESP / ES',
      'capital' => 'Madrid',
      'code_country' => '34',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Svalbard y Jan Mayen',
      'iso' => 'SJM / SJ',
      'capital' => 'Longyearbyen',
      'code_country' => '47',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Suecia',
      'iso' => 'SWE / SE',
      'capital' => 'Stockholm',
      'code_country' => '46',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Suiza',
      'iso' => 'CHE / CH',
      'capital' => 'Berne',
      'code_country' => '41',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Reino Unido',
      'iso' => 'GBR / GB',
      'capital' => 'London',
      'code_country' => '44',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Vaticano',
      'iso' => 'VAT / VA',
      'capital' => 'Vatican City',
      'code_country' => '379',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Åland',
      'iso' => 'ALA / AX',
      'capital' => 'Mariehamn',
      'code_country' => '358',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Anguila',
      'iso' => 'AIA / AI',
      'capital' => 'The Valley',
      'code_country' => '1-264',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Antigua y Barbuda',
      'iso' => 'ATG / AG',
      'capital' => 'St. Johns',
      'code_country' => '1-268',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Aruba',
      'iso' => 'ABW / AW',
      'capital' => 'Oranjestad',
      'code_country' => '297',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Bahamas',
      'iso' => 'BHS / BS',
      'capital' => 'Nassau',
      'code_country' => '1-242',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Bermudas',
      'iso' => 'BMU / BM',
      'capital' => 'Hamilton',
      'code_country' => '1-441',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Vírgenes Británicas',
      'iso' => 'VGB / VG',
      'capital' => 'Road Town',
      'code_country' => '1-284',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Canadá',
      'iso' => 'CAN / CA',
      'capital' => 'Ottawa',
      'code_country' => '1',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Caimán',
      'iso' => 'CYM / KY',
      'capital' => 'George Town',
      'code_country' => '1-345',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Cuba',
      'iso' => 'CUB / CU',
      'capital' => 'Havana',
      'code_country' => '53',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Dominica',
      'iso' => 'DMA / DM',
      'capital' => 'Roseau',
      'code_country' => '1-767',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'República Dominicana',
      'iso' => 'DOM / DO',
      'capital' => 'Santo Domingo',
      'code_country' => '1-809, 1-829, 1-849',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Groenlandia',
      'iso' => 'GRL / GL',
      'capital' => 'Nuuk',
      'code_country' => '299',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Granada',
      'iso' => 'GRD / GD',
      'capital' => 'St. Georges',
      'code_country' => '1-473',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Haiti',
      'iso' => 'HTI / HT',
      'capital' => 'Port-au-Prince',
      'code_country' => '509',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Jamaica',
      'iso' => 'JAM / JM',
      'capital' => 'Kingston',
      'code_country' => '1-876',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'México',
      'iso' => 'MEX / MX',
      'capital' => 'Mexico City',
      'code_country' => '52',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Puerto Rico',
      'iso' => 'PRI / PR',
      'capital' => 'San Juan',
      'code_country' => '1-787, 1-939',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Saint-Barthélemy',
      'iso' => 'BLM / BL',
      'capital' => 'Gustavia',
      'code_country' => '590',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'San Cristobal y Nevis',
      'iso' => 'KNA / KN',
      'capital' => 'Basseterre',
      'code_country' => '1-869',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Santa Lucía',
      'iso' => 'LCA / LC',
      'capital' => 'Castries',
      'code_country' => '1-758',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'San Martín',
      'iso' => 'MAF / MF',
      'capital' => 'Marigot',
      'code_country' => '590',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'San Pedro y Miquelón',
      'iso' => 'SPM / PM',
      'capital' => 'Saint-Pierre',
      'code_country' => '508',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'San Vicente y las Granadinas',
      'iso' => 'VCT / VC',
      'capital' => 'Kingstown',
      'code_country' => '1-784',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Sint Maarten',
      'iso' => 'SXM / SX',
      'capital' => 'Philipsburg',
      'code_country' => '1-721',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Turcas y Caicos',
      'iso' => 'TCA / TC',
      'capital' => 'Cockburn Town',
      'code_country' => '1-649',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Vírgenes de los Estados Unidos',
      'iso' => 'VIR / VI',
      'capital' => 'Charlotte Amalie',
      'code_country' => '1-340',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Estados Unidos',
      'iso' => 'USA / US',
      'capital' => 'Washington',
      'code_country' => '1',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Samoa Americana',
      'iso' => 'ASM / AS',
      'capital' => 'Pago Pago',
      'code_country' => '1-684',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Australia',
      'iso' => 'AUS / AU',
      'capital' => 'Canberra',
      'code_country' => '61',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Isla de Navidad',
      'iso' => 'CXR / CX',
      'capital' => 'Flying Fish Cove',
      'code_country' => '61',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Cocos',
      'iso' => 'CCK / CC',
      'capital' => 'West Island',
      'code_country' => '61',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Cook',
      'iso' => 'COK / CK',
      'capital' => 'Avarua',
      'code_country' => '682',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Fiyi',
      'iso' => 'FJI / FJ',
      'capital' => 'Suva',
      'code_country' => '679',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Polinesia Francesa',
      'iso' => 'PYF / PF',
      'capital' => 'Papeete',
      'code_country' => '689',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Guam',
      'iso' => 'GUM / GU',
      'capital' => 'Hagatna',
      'code_country' => '1-671',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Kiribati',
      'iso' => 'KIR / KI',
      'capital' => 'Tarawa',
      'code_country' => '686',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Marshall',
      'iso' => 'MHL / MH',
      'capital' => 'Majuro',
      'code_country' => '692',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Micronesia',
      'iso' => 'FSM / FM',
      'capital' => 'Palikir',
      'code_country' => '691',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Nauru',
      'iso' => 'NRU / NR',
      'capital' => 'Yaren',
      'code_country' => '674',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Nueva Caledonia',
      'iso' => 'NCL / NC',
      'capital' => 'Noumea',
      'code_country' => '687',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Nueva Zelanda',
      'iso' => 'NZL / NZ',
      'capital' => 'Wellington',
      'code_country' => '64',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Niue',
      'iso' => 'NIU / NU',
      'capital' => 'Alofi',
      'code_country' => '683',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Marianas del Norte',
      'iso' => 'MNP / MP',
      'capital' => 'Saipan',
      'code_country' => '1-670',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Palaos',
      'iso' => 'PLW / PW',
      'capital' => 'Melekeok',
      'code_country' => '680',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Papúa-Nueva Guinea',
      'iso' => 'PNG / PG',
      'capital' => 'Port Moresby',
      'code_country' => '675',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Pitcairn',
      'iso' => 'PCN / PN',
      'capital' => 'Adamstown',
      'code_country' => '64',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Santa Elena',
      'iso' => 'SHN / SH',
      'capital' => 'Jamestown',
      'code_country' => '290',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Samoa',
      'iso' => 'WSM / WS',
      'capital' => 'Apia',
      'code_country' => '685',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Salomón',
      'iso' => 'SLB / SB',
      'capital' => 'Honiara',
      'code_country' => '677',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Tokelau',
      'iso' => 'TKL / TK',
      'capital' => '',
      'code_country' => '690',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Tonga',
      'iso' => 'TON / TO',
      'capital' => 'Nukualofa',
      'code_country' => '676',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Tuvalu',
      'iso' => 'TUV / TV',
      'capital' => 'Funafuti',
      'code_country' => '688',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Vanuatu',
      'iso' => 'VUT / VU',
      'capital' => 'Port Vila',
      'code_country' => '678',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Wallis y Futuna',
      'iso' => 'WLF / WF',
      'capital' => 'Mata Utu',
      'code_country' => '681',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Bahrein',
      'iso' => 'BHR / BH',
      'capital' => 'Manama',
      'code_country' => '973',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Irán',
      'iso' => 'IRN / IR',
      'capital' => 'Tehran',
      'code_country' => '98',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Iraq',
      'iso' => 'IRQ / IQ',
      'capital' => 'Baghdad',
      'code_country' => '964',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Israel',
      'iso' => 'ISR / IL',
      'capital' => 'Jerusalem',
      'code_country' => '972',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Jordania',
      'iso' => 'JOR / JO',
      'capital' => 'Amman',
      'code_country' => '962',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Kuwait',
      'iso' => 'KWT / KW',
      'capital' => 'Kuwait City',
      'code_country' => '965',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Líbano',
      'iso' => 'LBN / LB',
      'capital' => 'Beirut',
      'code_country' => '961',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Omán',
      'iso' => 'OMN / OM',
      'capital' => 'Muscat',
      'code_country' => '968',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Palestine',
      'iso' => 'PSE / PS',
      'capital' => 'East Jerusalem',
      'code_country' => '970',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Qatar',
      'iso' => 'QAT / QA',
      'capital' => 'Doha',
      'code_country' => '974',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Arabia Saudita',
      'iso' => 'SAU / SA',
      'capital' => 'Riyadh',
      'code_country' => '966',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Siria',
      'iso' => 'SYR / SY',
      'capital' => 'Damascus',
      'code_country' => '963',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Turquía',
      'iso' => 'TUR / TR',
      'capital' => 'Ankara',
      'code_country' => '90',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Emiratos Árabes Uni.',
      'iso' => 'ARE / AE',
      'capital' => 'Abu Dhabi',
      'code_country' => '971',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Yemen',
      'iso' => 'YEM / YE',
      'capital' => 'Sanaa',
      'code_country' => '967',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Argelia',
      'iso' => 'DZA / DZ',
      'capital' => 'Algiers',
      'code_country' => '213',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Angola',
      'iso' => 'AGO / AO',
      'capital' => 'Luanda',
      'code_country' => '244',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Benín',
      'iso' => 'BEN / BJ',
      'capital' => 'Porto-Novo',
      'code_country' => '229',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Botswana',
      'iso' => 'BWA / BW',
      'capital' => 'Gaborone',
      'code_country' => '267',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Burkina Faso',
      'iso' => 'BFA / BF',
      'capital' => 'Ouagadougou',
      'code_country' => '226',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Burundi',
      'iso' => 'BDI / BI',
      'capital' => 'Bujumbura',
      'code_country' => '257',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Camerún',
      'iso' => 'CMR / CM',
      'capital' => 'Yaounde',
      'code_country' => '237',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Cabo Verde',
      'iso' => 'CPV / CV',
      'capital' => 'Praia',
      'code_country' => '238',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Rep. Centroafricana',
      'iso' => 'CAF / CF',
      'capital' => 'Bangui',
      'code_country' => '236',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Chad',
      'iso' => 'TCD / TD',
      'capital' => 'NDjamena',
      'code_country' => '235',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Comores',
      'iso' => 'COM / KM',
      'capital' => 'Moroni',
      'code_country' => '269',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'República Democrática del Congo',
      'iso' => 'COD / CD',
      'capital' => 'Kinshasa',
      'code_country' => '243',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Yibuti',
      'iso' => 'DJI / DJ',
      'capital' => 'Djibouti',
      'code_country' => '253',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Egipto',
      'iso' => 'EGY / EG',
      'capital' => 'Cairo',
      'code_country' => '20',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Guinea Ecuatorial',
      'iso' => 'GNQ / GQ',
      'capital' => 'Malabo',
      'code_country' => '240',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Eritrea',
      'iso' => 'ERI / ER',
      'capital' => 'Asmara',
      'code_country' => '291',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Etiopía',
      'iso' => 'ETH / ET',
      'capital' => 'Addis Ababa',
      'code_country' => '251',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Gabón',
      'iso' => 'GAB / GA',
      'capital' => 'Libreville',
      'code_country' => '241',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Gambia',
      'iso' => 'GMB / GM',
      'capital' => 'Banjul',
      'code_country' => '220',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Ghana',
      'iso' => 'GHA / GH',
      'capital' => 'Accra',
      'code_country' => '233',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'República Guinea',
      'iso' => 'GIN / GN',
      'capital' => 'Conakry',
      'code_country' => '224',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Guinea-Bisáu',
      'iso' => 'GNB / GW',
      'capital' => 'Bissau',
      'code_country' => '245',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Ivory Coast',
      'iso' => 'CIV / CI',
      'capital' => 'Yamoussoukro',
      'code_country' => '225',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Kenia',
      'iso' => 'KEN / KE',
      'capital' => 'Nairobi',
      'code_country' => '254',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Lesotho',
      'iso' => 'LSO / LS',
      'capital' => 'Maseru',
      'code_country' => '266',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Liberia',
      'iso' => 'LBR / LR',
      'capital' => 'Monrovia',
      'code_country' => '231',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Libia',
      'iso' => 'LBY / LY',
      'capital' => 'Tripolis',
      'code_country' => '218',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Madagascar',
      'iso' => 'MDG / MG',
      'capital' => 'Antananarivo',
      'code_country' => '261',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Malawi',
      'iso' => 'MWI / MW',
      'capital' => 'Lilongwe',
      'code_country' => '265',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Malí',
      'iso' => 'MLI / ML',
      'capital' => 'Bamako',
      'code_country' => '223',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Mauritania',
      'iso' => 'MRT / MR',
      'capital' => 'Nouakchott',
      'code_country' => '222',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Mauricio',
      'iso' => 'MUS / MU',
      'capital' => 'Port Louis',
      'code_country' => '230',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Mayotte',
      'iso' => 'MYT / YT',
      'capital' => 'Mamoudzou',
      'code_country' => '262',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Marruecos',
      'iso' => 'MAR / MA',
      'capital' => 'Rabat',
      'code_country' => '212',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Mozambique',
      'iso' => 'MOZ / MZ',
      'capital' => 'Maputo',
      'code_country' => '258',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Namibia',
      'iso' => 'NAM / NA',
      'capital' => 'Windhoek',
      'code_country' => '264',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Niger',
      'iso' => 'NER / NE',
      'capital' => 'Niamey',
      'code_country' => '227',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Nigeria',
      'iso' => 'NGA / NG',
      'capital' => 'Abuja',
      'code_country' => '234',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'República del Congo',
      'iso' => 'COG / CG',
      'capital' => 'Brazzaville',
      'code_country' => '242',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Reunión',
      'iso' => 'REU / RE',
      'capital' => 'Saint-Denis',
      'code_country' => '262',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Ruanda',
      'iso' => 'RWA / RW',
      'capital' => 'Kigali',
      'code_country' => '250',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'San Tomé y Príncipe',
      'iso' => 'STP / ST',
      'capital' => 'Sao Tome',
      'code_country' => '239',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Senegal',
      'iso' => 'SEN / SN',
      'capital' => 'Dakar',
      'code_country' => '221',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Seychelles',
      'iso' => 'SYC / SC',
      'capital' => 'Victoria',
      'code_country' => '248',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Sierra Leona',
      'iso' => 'SLE / SL',
      'capital' => 'Freetown',
      'code_country' => '232',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Somalia',
      'iso' => 'SOM / SO',
      'capital' => 'Mogadishu',
      'code_country' => '252',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Sudáfrica',
      'iso' => 'ZAF / ZA',
      'capital' => 'Pretoria',
      'code_country' => '27',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Sudán del Sur',
      'iso' => 'SSD / SS',
      'capital' => 'Juba',
      'code_country' => '211',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Sudán',
      'iso' => 'SDN / SD',
      'capital' => 'Khartoum',
      'code_country' => '249',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Swazilandia',
      'iso' => 'SWZ / SZ',
      'capital' => 'Mbabane',
      'code_country' => '268',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Tanzania',
      'iso' => 'TZA / TZ',
      'capital' => 'Dodoma',
      'code_country' => '255',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Togo',
      'iso' => 'TGO / TG',
      'capital' => 'Lome',
      'code_country' => '228',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Túnez',
      'iso' => 'TUN / TN',
      'capital' => 'Tunis',
      'code_country' => '216',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Uganda',
      'iso' => 'UGA / UG',
      'capital' => 'Kampala',
      'code_country' => '256',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Sahara Occidental',
      'iso' => 'ESH / EH',
      'capital' => 'El-Aaiun',
      'code_country' => '212',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Zambia',
      'iso' => 'ZMB / ZM',
      'capital' => 'Lusaka',
      'code_country' => '260',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Zimbabwe',
      'iso' => 'ZWE / ZW',
      'capital' => 'Harare',
      'code_country' => '263',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Argentina',
      'iso' => 'ARG / AR',
      'capital' => 'Buenos Aires',
      'code_country' => '54',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Barbados',
      'iso' => 'BRB / BB',
      'capital' => 'Bridgetown',
      'code_country' => '1-246',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Belice',
      'iso' => 'BLZ / BZ',
      'capital' => 'Belmopan',
      'code_country' => '501',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Bolivia',
      'iso' => 'BOL / BO',
      'capital' => 'Sucre',
      'code_country' => '591',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Brasil',
      'iso' => 'BRA / BR',
      'capital' => 'Brasilia',
      'code_country' => '55',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Chile',
      'iso' => 'CHL / CL',
      'capital' => 'Santiago',
      'code_country' => '56',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Colombia',
      'iso' => 'COL / CO',
      'capital' => 'Bogota',
      'code_country' => '57',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Costa Rica',
      'iso' => 'CRI / CR',
      'capital' => 'San Jose',
      'code_country' => '506',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Curazao',
      'iso' => 'CUW / CW',
      'capital' => 'Willemstad',
      'code_country' => '599',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Ecuador',
      'iso' => 'ECU / EC',
      'capital' => 'Quito',
      'code_country' => '593',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'El Salvador',
      'iso' => 'SLV / SV',
      'capital' => 'San Salvador',
      'code_country' => '503',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Islas Malvinas',
      'iso' => 'FLK / FK',
      'capital' => 'Stanley',
      'code_country' => '500',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Guatemala',
      'iso' => 'GTM / GT',
      'capital' => 'Guatemala City',
      'code_country' => '502',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Guyana',
      'iso' => 'GUY / GY',
      'capital' => 'Georgetown',
      'code_country' => '592',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Honduras',
      'iso' => 'HND / HN',
      'capital' => 'Tegucigalpa',
      'code_country' => '504',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Nicaragua',
      'iso' => 'NIC / NI',
      'capital' => 'Managua',
      'code_country' => '505',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Panamá',
      'iso' => 'PAN / PA',
      'capital' => 'Panama City',
      'code_country' => '507',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Paraguay',
      'iso' => 'PRY / PY',
      'capital' => 'Asuncion',
      'code_country' => '595',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Perú',
      'iso' => 'PER / PE',
      'capital' => 'Lima',
      'code_country' => '51',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Surinam',
      'iso' => 'SUR / SR',
      'capital' => 'Paramaribo',
      'code_country' => '597',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Trinidad y Tobago',
      'iso' => 'TTO / TT',
      'capital' => 'Port of Spain',
      'code_country' => '1-868',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Uruguay',
      'iso' => 'URY / UY',
      'capital' => 'Montevideo',
      'code_country' => '598',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Venezuela',
      'iso' => 'VEN / VE',
      'capital' => 'Caracas',
      'code_country' => '58',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Albania',
      'iso' => 'ALB / AL',
      'capital' => 'Tirana',
      'code_country' => '355',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Bielorrusia',
      'iso' => 'BLR / BY',
      'capital' => 'Minsk',
      'code_country' => '375',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Bosnia-Herzegovina',
      'iso' => 'BIH / BA',
      'capital' => 'Sarajevo',
      'code_country' => '387',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Bulgaria',
      'iso' => 'BGR / BG',
      'capital' => 'Sofia',
      'code_country' => '359',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Croacia',
      'iso' => 'HRV / HR',
      'capital' => 'Zagreb',
      'code_country' => '385',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Chipre',
      'iso' => 'CYP / CY',
      'capital' => 'Nicosia',
      'code_country' => '357',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'República Checa',
      'iso' => 'CZE / CZ',
      'capital' => 'Prague',
      'code_country' => '420',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Estonia',
      'iso' => 'EST / EE',
      'capital' => 'Tallinn',
      'code_country' => '372',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Georgia',
      'iso' => 'GEO / GE',
      'capital' => 'Tbilisi',
      'code_country' => '995',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Hungría',
      'iso' => 'HUN / HU',
      'capital' => 'Budapest',
      'code_country' => '36',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Letonia',
      'iso' => 'LVA / LV',
      'capital' => 'Riga',
      'code_country' => '371',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Lituania',
      'iso' => 'LTU / LT',
      'capital' => 'Vilnius',
      'code_country' => '370',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Macedonia',
      'iso' => 'MKD / MK',
      'capital' => 'Skopje',
      'code_country' => '389',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Moldavia',
      'iso' => 'MDA / MD',
      'capital' => 'Chisinau',
      'code_country' => '373',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Montenegro',
      'iso' => 'MNE / ME',
      'capital' => 'Podgorica',
      'code_country' => '382',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Polonia',
      'iso' => 'POL / PL',
      'capital' => 'Warsaw',
      'code_country' => '48',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Rumanía',
      'iso' => 'ROU / RO',
      'capital' => 'Bucharest',
      'code_country' => '40',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Rusia',
      'iso' => 'RUS / RU',
      'capital' => 'Moscow',
      'code_country' => '7',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Serbia',
      'iso' => 'SRB / RS',
      'capital' => 'Belgrade',
      'code_country' => '381',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Eslovaquia',
      'iso' => 'SVK / SK',
      'capital' => 'Bratislava',
      'code_country' => '421',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Eslovenia',
      'iso' => 'SVN / SI',
      'capital' => 'Ljubljana',
      'code_country' => '386',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    Country::create([
      'name' => 'Ucrania',
      'iso' => 'UKR / UA',
      'capital' => 'Kiev',
      'code_country' => '380',
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
