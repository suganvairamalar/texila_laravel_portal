<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobLocation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_locations';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['job_location_name'];

    public function users(){
        return $this->hasOne(User::class,'job_location_id','id');
    }
}
