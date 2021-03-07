<?php

namespace App\Models;

use Config\Database;
use App\Models\Interface\ModelInterface;

class ReviewModel implements ModelInterface
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->builder = $this->db->table('reviews');
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
        return $this->builder->insert($data);
    }


    /* Retrieve Methods */


    /**
     * Gets the specified limit of rows of reviews of a selected user,
     * otherwise returns all reviews.
     *
     * @param int $reviewee_uid `user_id` of the user selected
     * @param array $options list of Optional options
     * Default Values
     * $options['limit'] = 0
     * $options['offset'] = 0
     * $options['order'] = 'created_at'
     * $options['sortOrder'] = 'desc'
     *
     */

    public function get($reviewee_uid, $options) {
        $limit = $options['limit'] ?? 0;
        $offset = $options['offset'] ?? 0;
        $order = $options['order'] ?? 'created_at';
        $sortOrder = $options['sortOrder'] ?? 'desc';

        return $this->builder->where('reviewee_uid', $reviewee_uid)
                ->orderBy($order, $sortOrder)
                ->get($limit, $offset)
                ->getResultArray();
    }


    /* Update Methods */


    /**
     * Updates the current user's review to a selected user.
     *
     * @param array $data data to be updated, usually comes from a form
     * @param array $options
     * $options = ['reviewer_uid' => 1, 'reviewee_uid' => 2];
     *
     */
    public function update($data, $options){
        $reviewer_uid = $options['reviewer_uid'];
        $reviewee_uid = $options['reviewee_uid'];

        return $this->builder
                ->where('reviewer_uid', $reviewer_uid)
                ->where('reviewee_uid', $reviewee_uid)
                ->update($data);
    }

    /**
     * Deletes the user's review.
     *
     * @param array $data must contain reviewer id and reviewee id
     * $data = ['reviewer_uid' => 1, 'reviewee_uid' => 2];
     *
     */
    public function delete($data){
        return $this->builder
                ->where('reviewer_uid', $data['reviewer_uid'])
                ->where('reviewee_uid', $data['reviewee_uid'])
                ->delete();
    }
}