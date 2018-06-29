<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];

    protected $fillable = ['slug'];

    public function meals()
    {
    	return $this->belongsToMany('App\Meal');
    }
}


class TagTranslation extends Model
{
	public $timestamps = false;

	protected $fillable = ['title'];
}