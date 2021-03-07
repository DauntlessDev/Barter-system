<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Models\Interface\ModelInterface;

class ReviewsModel implements ModelInterface
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }


    /* Query calls */
    /* Functions to be used on controllers */


    /* Create Methods */
    
    
    /**
     * Creates a new review record.
     * 
     * @param array $data array of data to be inserted
     * 
     */
    public function create($data){
        $builder =  $this->db->table('reviews');
        return $builder->insert($data);
    }


    /* Retrieve Methods */


    /**
     * Gets the specified limit of rows of reviews of a selected user,
     * otherwise returns all reviews.
     * 
     * @param mixed $reviewee_uid `user_id` of the user selected 
     * 
     */
    public function get($reviewee_uid, $limit = 0, $offset = 0,
                        $order = 'created_at', $sortOrder = 'desc'){
        $builder = $this->db->table('reviews');
        return $builder->where('reviewee_uid', $reviewee_uid)
                       ->orderBy($order, $sortOrder)
                       ->get($limit, $offset)
                       ->getResultArray();
    }


    /* Update Methods */


    /**
     * Updates the current user's review to a selected user.
     * 
     * @param array $data data to be updated, usually comes from a form
     * @param mixed $reviewer_uid `user_id` of the current user, defaults to
     * the current user in session
     * @param mixed $reviewee_uid `user_id` of the reviewed user
     * 
     */
    public function updateReview($data, $reviewer_uid, $reviewee_uid){
        $where = [
            'reviewer_uid'    => $reviewer_uid,
            'reviewee_uid'    => $reviewee_uid,
        ];
        $data += $where;
        $builder = $this->db->table('reviews');
        return $builder->update($data, $where);
    }
    
}