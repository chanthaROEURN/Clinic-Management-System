<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     *  Below all methods are creating Eloquent's One to Many (inverse) Relationships.
     *  for example, many patient can have a same department.
     *
     */

    /**
     * @return object
     */
    public function patDepartment(){
        /**
         *  return department which belongs to an patient.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->belongsTo('App\Department','dept_id');
    }

    /**
     * @return object
     */
    public function patDivision(){
        return $this->belongsTo('App\Division','division_id');
    }

    /**
     * @return object
     */
    public function patCountry(){
        return $this->belongsTo('App\Country','country_id');
    }

    /**
     * @return object
     */
    public function patState(){
        return $this->belongsTo('App\State','state_id');
    }

    /**
     * @return object
     */
    public function patCity(){
        return $this->belongsTo('App\City','city_id');
    }

    /**
     * @return object
     */
    public function patSalary(){
        return $this->belongsTo('App\Salary','salary_id');
    }

    /**
     * @return object
     */
    public function patGender(){
        return $this->belongsTo('App\Gender','gender_id');
    }
}
