<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use SoftDeletes;
    use \Dimsav\Translatable\Translatable;

    protected $dates = ['deleted_at'];

    public $translatedAttributes = ['title','description'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }

}

class MealTranslation extends Model
{
	public $timestamps = false;

	protected $fillable = ['title', 'description'];
}
