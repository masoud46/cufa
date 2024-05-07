<?php

namespace App\Http\Controllers;

use App\Mail\AttendanceConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$entries = 'resources/js/pages/home.js';

		return view('home', compact(
			'entries',
		));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function attendanceConfirmation(Request $request) {
		// return response()->json(['success' => true]);
		// return new AttendanceConfirmation((object) [
		// 	'firstname' => 'Masoud',
		// 	'lastname' => 'Fathi',
		// 	'company' => '',
		// 	'email' => 'masoudf46@gmail.com',
		// 	'phone' => '+32 472 87 70 55',
		// ]);
		$result = ['success' => true];
		$recipients = config('project.confirmation_to_address', null);

		if (empty($recipients)) {
			$result['data'] = "empty recipients: " . var_export($recipients, true);
			return response()->json($result);
		}

		$recipients = explode('|', $recipients);

		if (empty($recipients[0])) {
			$result['data'] = "empty recipients[0]: " . var_export($recipients[0], true);
			return response()->json($result);
		}

		try {
			foreach ($recipients as $recipient) {
				Mail::to($recipient)
					->send(new AttendanceConfirmation($request));
			}
		} catch (\Throwable $th) {
			$result['success'] = false;
			$result['data'] = $th->getMessage();
		}

		return response()->json($result);
	}
}
