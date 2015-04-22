<?php namespace App\Http\Controllers;

use App\Poll as Poll;
use App\PollOption as PollOption;
use Input;
use Illuminate\Database\Eloquent\Collection;

class PollController extends Controller {

	protected $poll;

	public function __construct(Poll $poll) {
		$this->poll = $poll;
	}

	public function index() {
		return view('singlepage');
	}

	public function getPoll($id = NULL) {
		if ($id) {
			$poll = $this->poll->find($id);

			// Fill the options
			if ($poll) {
				$poll->options;
			}

			return $poll;
		}

		return $this->poll->all();
	}

	public function postPoll() {
		$input = Input::get();

		$poll = $this->poll;
		$poll->title = $input['title'];
		$poll->save();

		$options = $input['options'];
		foreach ($options as $option) {
			$option['poll_id'] = $this->poll->id;
			$pollOption = PollOption::create($option);
			$poll->options()->save($pollOption);
		}

		return $poll;
	}

	public function putPoll($id) {
		$poll = $this->poll->find($id);
		$updateVariables = Input::get();

		$poll->title = $updateVariables['title'];
		$poll->save();

		// Always remove all options
		$poll->options()->delete();

		$options = $updateVariables['options'];
		foreach ($options as $option) {
			$option['poll_id'] = $id;
			$pollOption = PollOption::create($option);
			$poll->options()->save($pollOption);
		}

		return $this->poll;
	}

	public function deletePoll($id) {
		$poll = $this->poll->find($id);
		$poll->delete();
	}

}
