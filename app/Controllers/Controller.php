<?php

namespace App\Controllers;

use Philo\Blade\Blade;

class Controller
{
	protected $blade;

	/**
	 * Blade view engine is injected into the base controller
	 * @param Philo\Blade\Blade $blade
	 */
	public function __construct(Blade $blade)
	{
		$this->blade = $blade;
	}
}
