<?php namespace App;
//use App\Category;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
    protected $fillable =array('title','url','category_id','cover','body');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /*public function category () {
        return $this->belongsTo('App\Category');
    }*/
    public function category () {
        return $this->belongsTo('App\Category');
    }

}
