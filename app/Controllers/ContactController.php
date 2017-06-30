<?php

namespace App\Controllers;

use Respect\Validation\Validator as v;

class ContactController extends Controller
{
	/**
	 * Show the contact page
	 * @return void
	 */
	public function showContact()
	{
		$title = 'Your contact page';
		echo $this->blade->view()->make('contact', compact('title'))->render();
	}

	/**
	 * Try to post the contact form
	 * @return void
	 */
	public function postContactForm()
	{
		// Reset $_SESSION['contact']
		$_SESSION['contact'] = null;

		// Valide user form entries
		if ($this->validate($_POST) == true) {
			$this->sendMail($_POST);
		}

		// Redirect back to the contact page
		header('Location: /contact');
	}

	/**
	 * Validates the form entry
	 * @param  array $data
	 * @return boolean
	 */
	public function validate($data)
	{
		// Check that every field returns true on validation
		if (v::notEmpty()->validate($data['firstname'])
			&& v::notEmpty()->validate($data['lastname'])
			&& v::email()->validate($data['email'])
			&& v::notEmpty()->validate($data['phone'])
			&& v::notEmpty()->validate($data['message'])) {
			
			// Process data
			$_SESSION['contact']['success'] = 1;
			
			return true;
		} 

		// At least an error has occured
		$_SESSION['contact']['errors'] = 1;
		$_SESSION['contact']['old'] = $data;
		
		return false;
	}

	/**
	 * Send an email containing the contact form data
	 * @param  array $data
	 * @return void
	 */
	public function sendMail($data)
	{
		// Setup Swift transport instance
		$transport = \Swift_SmtpTransport::newInstance(getenv('MAIL_HOST'), getenv('MAIL_PORT'), getenv('MAIL_ENCRYPTION'))
			->setUsername(getenv('MAIL_USERNAME'))     
			->setPassword(getenv('MAIL_PASSWORD'));

		// Prepare the mailer instance, injecting $transport
		$mailer = \Swift_Mailer::newInstance($transport);

		// Prepare the message
		$message = \Swift_Message::newInstance('Contact')
			->setFrom([getenv('MAIL_USERNAME')])
			->setTo([getenv('MAIL_RECIPIENT')])
			->setBody('<h4>Nouveau contact depuis le site</h4>'
			    . '<strong>Nom</strong> ' . $data['lastname'] . '<br>'
			    . '<strong>Prénom</strong> ' . $data['firstname'] . '<br>'
			    . '<strong>Email</strong> ' . $data['email'] . '<br>'
			    . '<strong>Téléphone</strong> ' . $data['phone'] . '<br>'
			    . '<strong>Message</strong><br>'
			    . '<p>' . nl2br($data['message']) . '</p>', 'text/html');

		// Send the mail
		$result = $mailer->send($message);
	}
}
