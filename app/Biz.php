<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biz extends Model
{
      protected $table = 'biz';

      protected $fillable = ['name', 'adress', 'contactname', 'email','website', 'phone1', 'phone2'];

   public function address()
    {
      return $this->hasOne('App\Address');
    }

   public function ownerbiz()
    {
        return $this->BelongsTo('App\User');
    }
    public function subcats()
  {
       return $this->belongsToMany('App\SubCat','biz_subcat_pivot','biz_id', 'subcat_id');
    }

    public function setTitleAttribute($value)
     {
       $this->attributes['name'] = $value;

      if (! $this->exists) {
            $this->setUniqueSlug($value, '');
        }
    }

     protected function setUniqueSlug($name, $extra)
    {
        $slug = str_slug($name.'-'.$extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($name, $extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }
    
    public function cats()
    {
        return $this->BelongsToMany('App\Cat', 'biz_cat_pivot');
    }

    public function state()
    {
      return $this->belongsToMany('App\State','biz_state_pivot');
    }

    public function reviews()
    {
      return $this->hasMany('App\Review');
    }

    public function recalculateRating()
  {
      $reviews = $this->reviews()->notSpam()->approved();
      $avgRating = $reviews->avg('rating');
      $this->rating_cache = round($avgRating,1);
      $this->rating_count = $reviews->count();
      $this->save();
  }
}

