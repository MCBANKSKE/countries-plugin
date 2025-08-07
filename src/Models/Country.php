<?php

namespace Mcbankske\Countries\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'iso3', 'iso2', 'phonecode', 'capital', 'currency', 
        'currency_symbol', 'tld', 'native', 'region', 'subregion', 
        'timezones', 'translations', 'latitude', 'longitude', 
        'emoji', 'emojiU', 'flag', 'wikiDataId'
    ];

    protected $casts = [
        'timezones' => 'array', 
        'translations' => 'array', 
        'flag' => 'boolean',
    ];

    /**
     * A country has many states.
     */
    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    /**
     * A country has many cities.
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }


}
