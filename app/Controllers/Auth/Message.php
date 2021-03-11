<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\MessageModel;
use CodeIgniter\API\ResponseTrait;

class Message extends BaseController
{
	use ResponseTrait;

	private $messageModel;

	public function __construct() {
		$this->messageModel = new MessageModel();
	}

	public function index() {
		if ($this->request->getMethod() === 'get') return view('pages/auth/message');
	}

	/*
	 * Send chat to user
	 */
	public function send() {
		$body = get_object_vars($this->request->getJSON());

		if (empty(trim($body['content']))) return $this->respond(['error' => 'Content must not be empty'], 400);

		$this->messageModel->insert($body);

		return $this->respond($body);
	}

	/*
	 * Retrieve all past conversation
	 */
	public function inbox() {
		$body = get_object_vars($this->request->getJSON());

		$data = [
			'data' => $this->messageModel->getAllRecentMessages(['recipient_uid' => $body['recipient_uid']]),
		];

		return $this->respond($data);
	}

	/*
	 * Retrieve all conversations between two users
	 */
	public function conversation() {
		$body = get_object_vars($this->request->getJSON());

		$data = [
			'data' => $this->messageModel->getMessagesWith([
				'sender_uid' => $body['sender_uid'],
				'recipient_uid' => $body['recipient_uid'],
				'msg_id' => $body['msg_id'],
			], [
				'sortOrder' => 'asc'
			]),
		];

		return $this->respond($data);
	}
}
?>