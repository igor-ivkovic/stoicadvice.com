<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'advices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['author', 'book', 'advice'];



    public $timestamps = false;



}
