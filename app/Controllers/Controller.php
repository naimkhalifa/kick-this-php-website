<?php

namespace App\Controllers;

use Philo\Blade\Blade;

class Controller
{
	/**
	 * The blade instance
	 * @var Philo\Blade\Blade
	 */
	protected $blade;

	/**
	 * Blade view engine class is injected into the base controller
	 * @param Philo\Blade\Blade $blade
	 */
	public function __construct(Blade $blade)
	{
		$this->blade = $blade;
	}
}
