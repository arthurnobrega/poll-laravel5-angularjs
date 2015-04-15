<?php namespace App\Http\Controllers;

use App\Poll as Poll;
use App\PollOption as PollOption;
use Input;
use Illuminate\Database\Eloquent\Collection;

class PollController extends Controller {


	public function __construct() {
		$this->middleware('guest');
	}

	public function index() {
		return view('singlepage');
	}

	public function getPoll($id = NULL) {
		if ($id) {
			$poll = Poll::find($id);
			// Fill the options
			$poll->options;

			return $poll;
		}

		return Poll::all();
	}

	public function postPoll() {
		$updateVariables = Input::get();

		$poll = new Poll();
		$poll->title = $updateVariables['title'];
		$poll->save();

		$options = $updateVariables['options'];
		foreach ($options as $option) {
			$option['poll_id'] = $poll->id;
			$pollOption = PollOption::create($option);
			$poll->options()->save($pollOption);
		}
	}

	public function putPoll($id) {
		$poll = Poll::find($id);
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
	}

	public function deletePoll($id) {
		$poll = Poll::find($id);
		$poll->delete();
	}

}
