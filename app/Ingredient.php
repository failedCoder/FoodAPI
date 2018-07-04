<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];

    protected $fillable = ['slug'];

    protected $hidden = ['created_at','updated_at','deleted_at','translations','pivot'];

    public function meals()
    {
    	return $this->belongsToMany('App\Meal');
    }
}

class IngredientTranslation extends Model
{
	public $timestamps = false;

	protected $fillable = ['title'];
}
