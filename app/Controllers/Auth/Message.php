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
		$data = json_decode($this->request->getBody());

		$this->messageModel->insert($data);

		return $this->respond($data);
	}

	/*
	 * Retrieve all past conversation
	 */
	public function inbox(int $userId) {
		$data = [
			'data' => $this->messageModel->getAllRecentMessages(['recipient_uid' => $userId]),
		];

		return $this->respond($data);
	}

	/*
	 * Retrieve all conversations between two users
	 */
	public function conversation(int $senderUid, int $recipientUid) {
		$data = [
			'data' => $this->messageModel->getMessagesWith([
						'sender_uid' => $senderUid,
						'recipient_uid' => $recipientUid
					]),
		];

		return $this->respond($data);
	}
}
