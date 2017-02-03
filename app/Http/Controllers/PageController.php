<?php
/**
 * Definition for page Controller
 *
 * Important notes for controller doing
 * # Process variable data or params
 * # talk to the model
 * # compile or process data from the model (if needed)
 * # pass the data to the correct view
 *
 */

namespace App\Http\Controllers;

class PageController extends Controller {

	/**
	 * Function created for generate home page structure
	 * @return view
	 */
	public function getHome() {
		return view('pages.welcome');
	}

	/**
	 * Function created for generate about page structure
	 * @return view
	 */
	public function getAbout() {
		$name = "Tony";
		$surname = "Frost";

		# First solution for pass variable data into view
		// $full = "{$name} {$surname}";
		// return view('pages.about')->with("fullname", $full);

		# Second solution for pass variable data into view
		// $fullname = "{$name} {$surname}";
		// return view('pages.about')->withFullname($fullname);

		# Third solution for pass variable data into view
		# used for multiple vars
		// $fullname = "{$name} {$surname}";
		// $email = "gattoVerdone@example.com";
		// return view('pages.about')->withFullname($fullname)->withEmail($email);

		# Forth solution for pass variable data into view
		# used for multiple vars
		// $fullname = "{$name} {$surname}";
		// $email = "gattoVerdone@example.com";

		// # now we use data var for grab value
		// $data = [
		// 	'email' 	=> $email,
		// 	'fullname' 	=> $fullname
		// ];

		// return view('pages.about')->withData($data);
		// or
		// return view('pages.about', $data);

		# Five solution for pass variable data into view
		# used for multiple vars
		# using native php compact function
		$fullname = "{$name} {$surname}";
		$email = "gattoVerdone@example.com";

		// return view('pages.about', compact("fullname", "email"));
		// Alternative
		$data = [
			'email',
			'fullname'
		];

		return view('pages.about', compact($data));

	}

	/**
	 * Function created for generate contact page structure
	 * @return view
	 */
	public function getContact() {
		return view('pages.contact');
	}

}
