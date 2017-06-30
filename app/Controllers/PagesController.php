<?php

namespace App\Controllers;

class PagesController extends Controller
{
	/**
	 * Display the homepage
	 * @return void
	 */
	public function home()
	{
		$title = 'Home';
		echo $this->blade->view()->make('hello', compact('title'))->render();
	}
}
