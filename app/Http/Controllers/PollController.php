<?php namespace App\Http\Controllers;

use App\Poll as Poll;

class PollController extends Controller {


	public function __construct() {
		$this->middleware('guest');
	}

	public function index() {
		return view('singlepage');
	}

	public function getPoll($id = NULL) {
		if ($id) {
			return Poll::find($id);
		}

		return Poll::all();
	}

	public function postPoll() {
		return 'Add a poll';
	}

	public function putPoll($id) {
		return 'Update a poll';
	}

	public function deletePoll($id) {
		return 'Delete a poll';
	}

}
