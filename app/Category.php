<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    
    protected  $fillable = array('title');

    /**
     * @return mixed
     */
    public function articles () {
        //echo'hena';
        return $this->hasMany('App\Article');
    }

}
