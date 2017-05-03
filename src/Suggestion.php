<?php

// Vi importer model klassen til Eloquent for bruk i denne filen.
use Illuminate\Database\Eloquent\Model;

// Vi lager en ny kategori modell-klasse. En modell-klasse representerer en
// tabell i databasen, i dette tilfellet 'categories'.
class Suggestion extends Model
{
    protected $dates = ['date_added'];
    public $timestamps = false;

    // Vi må lage en metode i model-klassen for hver relasjon til en annen model-klasse.
    // En event tilhører en kategori.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}