<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PollOption extends Model {

    protected $fillable = [
        'poll_id',
        'text',
        'votes'
    ];

    /**
     * An option is owned by a poll.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function poll() {
        return $this->belongsTo('App\Poll');
    }

}
