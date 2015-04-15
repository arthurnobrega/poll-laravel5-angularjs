<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model {

    protected $fillable = [
        'title',
        'options'
    ];

    /**
     * A poll has many options.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function options() {
        return $this->hasMany('App\PollOption');
    }

}
