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

use Illuminate\Http\Request;

class PageController extends Controller {

	public function getHome() {
		return view('pages.welcome');
	}

	public function getAbout() {
		return view('pages.about');
	}

	public function getContact() {
		return view('pages.contact');
	}

}
