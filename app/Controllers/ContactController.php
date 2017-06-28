<?php

namespace App\Controllers;

use Respect\Validation\Validator as v;

class ContactController extends Controller
{
	public function showContact()
	{
		$title = 'Your contact page';
		echo $this->blade->view()->make('contact', compact('title'))->render();
	}

	public function postContactForm()
	{
		$_SESSION['contact'] = null;

		if ($this->validate($_POST) == true) {
			$this->sendMail($_POST);
		}

		header('Location: /contact');
	}

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

		$_SESSION['contact']['errors'] = 1;
		$_SESSION['contact']['old'] = $data;
		
		return false;
	}

	public function sendMail($data)
	{
		$transport = \Swift_SmtpTransport::newInstance(getenv('MAIL_HOST'), getenv('MAIL_PORT'), getenv('MAIL_ENCRYPTION'))
			->setUsername(getenv('MAIL_USERNAME'))     
			->setPassword(getenv('MAIL_PASSWORD'));

		$mailer = \Swift_Mailer::newInstance($transport);

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

		$result = $mailer->send($message);
	}
}
