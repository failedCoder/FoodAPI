<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];

    protected $fillable = ['slug'];

    protected $hidden = ['created_at','updated_at','deleted_at','translations'];

    public function meals()
    {
    	return $this->hasMany('App\Meal');
    }
}

class CategoryTranslation extends Model
{
	public $timestamps = false;

	protected $fillable = ['title'];
}
