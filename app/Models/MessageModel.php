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

		$select = [
			'messages.msg_id',
			'sender_uid',
			's_user.username as sender_username',
			'recipient_uid',
			'r_user.username as recipient_username',
			'content',
			'messages.created_at',
		];

		return $builder->select($select)
					   ->whereIn('sender_uid', [$where['sender_uid'], $where['recipient_uid']])
		  			   ->whereIn('recipient_uid', [$where['recipient_uid'], $where['sender_uid']])
				       ->where('msg_id >', $where['msg_id'] ?? 0)
					   ->join('user s_user', 's_user.user_id = messages.sender_uid')
					   ->join('user r_user', 'r_user.user_id = messages.recipient_uid')
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

		// Credits to Hezzz
		$this_user_uid = strval($where['recipient_uid']);

		
		$query1 = $builder->select("msg_id, recipient_uid AS user_id, content, created_at")
						  ->where('sender_uid', $this_user_uid)
						  ->getCompiledSelect();

		$query2 = $builder->select('msg_id, sender_uid AS user_id, content, created_at')
						->where('recipient_uid', $this_user_uid)
						->getCompiledSelect();

		$builder1 = $this->builder("($query1 UNION $query2) as msg");

		$query3 = $builder->select('msg.user_id, MAX(msg.created_at) as created_at')
						->from("($query1 UNION $query2) as msg")
						->groupBy('msg.user_id')
						->getCompiledSelect();

		$query4 = $builder1->select("msg.msg_id, msg.user_id, msg.content, msg.created_at")
					 ->join("($query3) as sub", 
					   		'msg.user_id = sub.user_id AND
							 msg.created_at = sub.created_at')
					 ->orderBy('msg.'.$sortBy, $sortOrder)
					 ->getCompiledSelect();

		$lastBuilder = $this->builder("($query4) as msg");
		return $lastBuilder->select("msg.msg_id, msg.user_id, u.username, msg.content, msg.created_at")
						   ->from('user as u')
						   ->where('msg.user_id = u.user_id')
						   ->orderBy('msg.'.$sortBy, $sortOrder)
						   ->get()
						   ->getResultArray();
	}
}
