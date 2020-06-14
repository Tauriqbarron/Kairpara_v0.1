<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applications extends Model
{
    protected $fillable = ['client_id','title','imagePath','description','price','street', 'suburb', 'city', 'postcode', 'date', 'start_time', 'finish_time'];

    public $timestamps = false;

    public function client() {

        return $this->belongsTo('App\Clients', 'client_id', 'id');
    }

    public function service_provider_job() {
        return $this->hasOne('App\Service_Provider_job', 'job_id', 'id');
    }

    public function quotes() {
        return $this->hasMany('App\quote');
    }


}
