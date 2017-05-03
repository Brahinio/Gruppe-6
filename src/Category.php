<?php

// Vi importer model klassen til Eloquent for bruk i denne filen.
use Illuminate\Database\Eloquent\Model;

// Vi lager en ny kategori modell-klasse. En modell-klasse representerer en
// tabell i databasen, i dette tilfellet 'categories'.
class Category extends Model {
    public $timestamps = false;

    // Vi må lage en metode i model-klassen for hver relasjon til en annen model-klasse.
    // En kategori har mange events.
    public function article()
    {
        return $this->hasMany(Article::class);
    }
    
    public function suggestion()
    {
        return $this->hasMany(Suggestion::class);
    }
}