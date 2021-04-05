<?php

namespace App\Models;

use Carbon;
use Jenssegers\Mongodb\Eloquent\Model;

class ApiModel extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'api_models';
    protected $fillable = ['id', 'p_name', 'p_desc', 'p_price'];

    public function setFirstNameAttribute($value)
    {
        $this->attributes['p_name'] = strtolower($value);
    }
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getCreatedAtAttribute($date)
    {
        return (new Carbon\Carbon($date))->format('m-d-Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return (new Carbon\Carbon($date))->format('m-d-Y');
    }
}
