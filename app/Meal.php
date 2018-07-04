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

    protected $hidden = ['created_at','updated_at','deleted_at','translations'];

    protected $appends = ['status'];

 
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

    public function getStatusAttribute()
    {

        $status = 'created';

        if (request('diff_time')) {

            $diffDate = new \DateTime();
            $diffDate->setTimestamp(request('diff_time'));

            if ($this->updated_at > $diffDate) {
                $status = 'modified';
            }
            if ($this->deleted_at > $diffDate) {
                    $status = 'deleted';
            }    
        }

       return $status;
    }

}

class MealTranslation extends Model
{
	public $timestamps = false;

	protected $fillable = ['title', 'description'];
}
