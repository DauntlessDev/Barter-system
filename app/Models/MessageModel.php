<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{

	protected $table            = 'messages';
	protected $primaryKey       = 'msg_id';
	protected $useAutoIncrement = true;
	protected $allowedFields    = [
		"sender_uid",
		"recipient_uid",
		"content",
	];

	protected $useTimestamps    = true;
	protected $createdField     = 'created_at';
	protected $updatedField     = '';

	// protected $validationRules      = [];
	// protected $validationMessages   = [];


	/* Query calls */
    /* Functions to be used on controllers */

    
    /* Create Methods */


	/**
	 * Create a new message.
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
	 * @param mixed $this_user_uid `user_id`of the current user
	 * @param mixed $that_user_uid `user_id`of another user
	 * @param int $limit number of messages to be returned
	 * 
	 */
	public function getMessagesWith($this_user_uid, $that_user_uid, $limit = 0,
						$offset = 0, $order = 'created_at', $sortOrder = 'desc'){
		$builder = $this->builder();
		return $builder->select()
					   ->groupStart()
							->groupStart()
								->where('sender_uid', $this_user_uid)
								->where('recipient_uid', $that_user_uid)
							->groupEnd()
							->orGroupStart()
								->where('sender_uid', $that_user_uid)
								->where('recipient_uid', $this_user_uid)
							->groupEnd()
						->groupEnd()
						->orderBy($order, $sortOrder)
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
	 * @param mixed $this_user_uid current user's `user_id`
	 * @param mixed $limit number of conversations to be returned
	 * 
	 */
	public function getAllRecentConversations($this_user_uid, $limit = 0, $offset = 0,
						$order = 'created_at', $sortOrder = 'desc'){
		$builder = $this->builder();
		
		$query1 = $builder->select('msg_id, recipient_uid AS user_id, content, created_at')
				->where('sender_uid', $this_user_uid)
				->getCompiledSelect();

		$query2 = $builder->select('msg_id, sender_uid AS user_id, content, created_at')
				->where('recipient_uid', $this_user_uid)
				->getCompiledSelect();
		
		return $builder->select('DISTINCT ON (user_id) *', false)
					   ->from($query1 . "UNION ALL" . $query2)
					   ->orderBy($order, $sortOrder)
					   ->get($limit, $offset)
					   ->getResultArray();
	}

}
