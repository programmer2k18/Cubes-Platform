<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\appModels\User;
use App\appModels\coworkingSpace;
use App\appModels\amenities;
use App\appModels\co_seating_desks;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
/*
$factory->define(User::class, function (Faker $faker) {

    $govn = ['Cairo','Giza','Alexandria','Aswan','Suez','Helwan','Sharqia',
             'Dakahlia','Ismailia','Beni Suef','6th of October'];

    $cities = ['Cairo'=>['10th of Ramadan','15th of May','Badr City'],
               'Giza'=>['Shobra','Doki','Sadat'],'Alexandria'=>['Dishna','Desouk','Dendera'],
               'Aswan'=>['Edfu','El Alamein','El Saff'],'Suez'=>['Faqous','Faraskur','Hihya'],
               'Helwan'=>['Kafr Saqr','Kafr Shukr','Kafr El Dawwar'],
               'Sharqia'=>['Maghagha','Mallawi','Manfalut'],
               'Dakahlia'=>['Matai','Marsa Alam','Mersa Matruh'],
               'Ismailia'=>['Metoubes','Mit Elwan','Mut'],
               'Beni Suef'=>['Bosh','Naqada','New Salhia'],
               '6th of October'=>['Zayed City','Elhosary','Mit Adlan']
              ];

    $gender = ['Male','Female'];
    $faculties = ['FCIA','Engineering','Law','Medicine','Commerce','Arts','Science','Media','Politics'
    ,'Economics','Pharmacy'];

    $cit_gov = rand(0,10);
    $g = $govn[$cit_gov];
    $city = $cities[$g];
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => uniqid(),
        'governorate' => $g,
        'city' => $city[rand(0,2)],
        'street' => $faker->streetAddress,
        'gender' => $gender[rand(0,1)],
        'age' => rand(15,75),
        'faculty' => $faculties[rand(0,10)],
        'phone' => $faker->phoneNumber,
        'remember_token' => Str::random(10),
    ];
});

$factory->define(coworkingSpace::class, function (Faker $faker) {

    $govn = ['Cairo','Giza','Alexandria','Aswan','Suez','Helwan','Sharqia',
        'Dakahlia','Ismailia','Beni Suef','6th of October'];

    $cities = ['Cairo'=>['10th of Ramadan','15th of May','Badr City'],
        'Giza'=>['Shobra','Doki','Sadat'],'Alexandria'=>['Dishna','Desouk','Dendera'],
        'Aswan'=>['Edfu','El Alamein','El Saff'],'Suez'=>['Faqous','Faraskur','Hihya'],
        'Helwan'=>['Kafr Saqr','Kafr Shukr','Kafr El Dawwar'],
        'Sharqia'=>['Maghagha','Mallawi','Manfalut'],
        'Dakahlia'=>['Matai','Marsa Alam','Mersa Matruh'],
        'Ismailia'=>['Metoubes','Mit Elwan','Mut'],
        'Beni Suef'=>['Bosh','Naqada','New Salhia'],
        '6th of October'=>['Zayed City','Elhosary','Mit Adlan']
    ];

    $brand = ['Normal','Popular'];

    $cit_gov = rand(0,10);
    $g = $govn[$cit_gov];
    $city = $cities[$g];
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => uniqid('#156$%',true),
        'governorate' => $g,
        'city' => $city[rand(0,2)],
        'street' => $faker->streetAddress,
        'description' => $faker->sentence,
        'brandingStatus' => $brand[rand(0,1)],
        'status' => 'activated',
        'remember_token' => Str::random(10),
    ];
});*/

/*$factory->define(amenities::class, function (Faker $faker) {
    $am = ['Equipments','Facilities','Community','Cool_Stuff'];
    $names = ['Equipments'=>['Printer','Scanner','Photocopier','Computers (PCs)','Recording Studio',
         'Video Recording Equipment','AR Equipment','VR Equipment'],

         'Facilities'=>['Kitchen','Personal Lockers','Event Space For Rent','Retail Space','Nearby Airbnb',
             'Phone Booth','Showers','Co-living Accommodation'],

         'Community'=>['Events','Workshops','Incubator programs','Community App','Accelerator programs',
             'Organized Sports Team','Pitching events','Community Lunches'],

         'Cool_Stuff'=>['Free Tea','Library','Air Conditioning','High-Speed WiFi','Ping Pong Table',
             'Gym','Arcade Games','Onsite Cafe']];
    $co = $am[rand(0,3)];
    return [
        'co_id' => function(){
           return coworkingSpace::all()->random();
        },
        'type' => $co,
        'name' => $names[$co][rand(0,7)],
        'description' =>$faker->sentence,
    ];
});*/
/*
$factory->define(co_seating_desks::class, function (Faker $faker) {


    $co_id = coworkingSpace::all()->random();
    $type=['Private_offices','General_Assets','Meeting_rooms'];
    $time = ['Per Hour','Per Day','Per Week'];
    return [
        'co_id'=>$co_id,
        'type'=>$type[rand(0,2)],
        'description'=>$faker->sentences,
        'capacity'=>rand(2,12),
        'price'=>rand(20,1000),
        'currency'=>'EGP',
        'pricePeriodType'=>$time[rand(0,2)],
    ];
    //"consoletvs/charts": "6.*",

});*/





