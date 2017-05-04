<?php

// Vi henter inn Composer sin autoload fil for å få tilgang på namespaces gjennom use.
require 'vendor/autoload.php';

// Vi importerer klasser fra tredjepartsbiblioteker ved bruk av namespaces i denne filen.
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Database;

// Vi kaller en statisk metode på Carbon klassen for å sette språket på tid og dato til norsk.
Carbon::setLocale('no');

// Vi setter opp en ny databasetilkobling.
$database = new Database();
$database->addConnection([
    'driver' => 'mysql',
    'port' => 3306,
    'host' => 'tek.westerdals.no',
    'username' => 'telmat15_common',
    'password' => 'Detteergruppe6',
    'database' => 'telmat15_Gruppe6',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
]);

// Vi bruker bootEloquent metoden for å koble oss til databasen.
$database->bootEloquent();