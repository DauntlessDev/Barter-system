<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class MessageModel extends Model
{

	protected $table            = 'messages';
	protected $primaryKey       = 'msg_id';
	protected $useAutoIncrement	= true;
	protected $allowedFields    = [
		"sender_uid",
		"recipient_uid",
		"content",
	];

	protected $useTimestamps	= true;
	protected $createdField		= 'created_at';
	protected $updatedField     = '';

	// protected $validationRules      = [];
	// protected $validationMessages   = [];


    /* Create Methods */

	/**
	 * Create a new message.
	 * 
	 * @param array $data Message data.
	 * 
	 * **Must have:**
     * `[
     *      'sender_uid' => 'session_user', 
     *      'recipient_uid' => 'that_user_id',
     * ]`
	 * 
	 * @return object|integer|false `msg_id` Of the inserted message, `false` on failure.
	 * 
	 */
	public function create($data){
		return $this->insert($data);
	}


	/* Retrieve Methods */

	/**
	 * Gets the list of messages of the current user and another user,
	 * sorted by the most recent one on the top of the list.
	 *
	 * @param array must contain assoc array of 'sender_id' 'recipient'
	 * @param array $options Query options to be used.
	 * @return array `ResultArray` of messages.
	 * Example:
	 * $where = ['sender_uid' => 2, 'recipient_uid' => 1];
	 * $messageModel->getMessagesWith($where);
	 *
	 */
	public function getMessagesWith($where, $options = null) {
		$limit = $options['limit'] ?? 0;
		$offset = $options['offset'] ?? 0;
		$sortBy = $options['sortBy'] ?? 'created_at';
		$sortOrder = $options['sortOrder'] ?? 'desc';
		$builder = $this->builder();

		return $builder->whereIn('sender_uid', [$where['sender_uid'], $where['recipient_uid']])
		  			   ->whereIn('recipient_uid', [$where['recipient_uid'], $where['sender_uid']])
					   ->orderBy($sortBy, $sortOrder)
				       ->get($limit, $offset)
					   ->getResultArray();
	}


	/**
	 * Returns a list of the most recent messages from each user
	 * that the current user had conversations with.
	 * Useful when previewing the user's conversations.
	 * 
	 * More information about the query here:
	 * http://sqlfiddle.com/#!15/1d80e/1
	 * https://stackoverflow.com/questions/14978532/write-union-query-in-codeigniter-style
	 * 
	 * @param mixed $sender_uid Current user's `user_id`
	 * @param array $options Query options to be used.
	 * @return array `ResultArray` of recent conversations of all user conversation.
	 * 
	 */
	public function getAllRecentMessages($where, $options = null) {
		$limit = $options['limit'] ?? 0;
		$offset = $options['offset'] ?? 0;
		$sortBy = $options['sortBy'] ?? 'created_at';
		$sortOrder = $options['sortOrder'] ?? 'desc';
		$builder = $this->builder();

		return $builder->select('*')
					   ->selectMax('created_at', 'created_at')
					   ->where('recipient_uid', [$where['recipient_uid']])
					   ->groupBy(['sender_uid', 'recipient_uid'])
					   ->orderBy($sortBy, $sortOrder)
				       ->get($limit, $offset)
					   ->getResultArray();
	}

}
