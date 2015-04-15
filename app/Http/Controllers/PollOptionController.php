<?php namespace App\Http\Controllers;

use App\PollOption as PollOption;
use Input;

class PollOptionController extends Controller {


	public function __construct() {
		$this->middleware('guest');
	}

	public function getPollOption($pollId, $pollOptionId = NULL) {
		if ($pollOptionId) {
			$pollOption = PollOption::find($pollOptionId);

			return $pollOption;
		}

		return PollOption::where('poll_id', $pollId)->get();
	}

	public function postPollOption() {
		return 'Add a poll';
	}

	public function putPollOption($pollId, $pollOptionId) {
		$updateVariables = Input::get();

		$pollOption = PollOption::find($pollOptionId);

		$pollOption->update($updateVariables);
	}

	public function deletePollOption($id) {
		return 'Delete a poll';
	}

}
