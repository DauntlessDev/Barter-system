<?php

namespace App\Models;

use Config\Database;
use App\Models\Interface\ModelInterface;
use Exception;

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
     * Create a new review.
     * 
     * @param array $data Data to be inserted.
     * @return mixed|false `false` On failure.
     * 
     */
    public function create($data){
        return $this->builder->insert($data);
    }


    /* Retrieve Methods */


    /**
     * Gets the reviews of a user or reviews by that user.
     * Used for getting the edit history.
     *
     * @param array $where array of key/value to be searched.
     * @param array $options Query options to be used.
     * @return array `ResultArray` of reviews.
     * $where = [
     *      'reviewer_uid' => 1, OR
     *      'reviewee_uid' => 2,
     * ];
     * $reviewModel->get($where);
     */
    public function get($where = [], $options = null){
        if (empty($where['reviewer_uid']) && empty($where['reviewee_uid'])) throw new Exception("Either reviewer_uid or reviewee_uid should be given.");

        $limit = $options['limit'] ?? 0;
        $offset = $options['offset'] ?? 0;
        $sortBy = $options['sortBy'] ?? 'created_at';
        $sortOrder = $options['sortOrder'] ?? 'desc';

        $new_builder = $this->db->table('reviews AS r');
        if(empty($where['reviewer_uid'])){
            $reviewee_uid = $where['reviewee_uid'];
            $cond = "r.reviewee_uid = $reviewee_uid AND r.reviewer_uid = u.user_id";
        }
        elseif(empty($where['reviewee_uid'])){
            $reviewer_uid = $where['reviewer_uid'];
            $cond = "r.reviewer_uid = $reviewer_uid AND r.reviewee_uid = u.user_id";
        }
        else{
            $reviewee_uid = $where['reviewee_uid'];
            $reviewer_uid = $where['reviewer_uid'];
            $cond = "r.reviewee_uid = $reviewee_uid AND r.reviewer_uid = $reviewer_uid AND r.reviewer_uid = u.user_id";
        }

        return $new_builder
                    ->select("r.reviewer_uid, r.reviewee_uid, r.rating, r.content, r.created_at, r.updated_at, 
                              u.username, u.photo_url")
                    ->join('user as u', $cond)
                    ->where($where)
                    ->orderBy($sortBy, $sortOrder)
                    ->get($limit, $offset)
                    ->getResultArray();
    }


    /**
     * Gets the recent reviews of a users or reviews made by the user.
     * Used in the user profile.
     *
     * @param array $where array of key/value to be searched.
     * @param array $options Query options to be used.
     * @return array `ResultArray` of reviews.
     * $where = [
     *      'reviewer_uid' => 1, OR
     *      'reviewee_uid' => 2,
     * ];
     * $reviewModel->get($where);
     */
    public function getAllRecentReviews($where, $options = null){
        $limit = $options['limit'] ?? 0;
        $offset = $options['offset'] ?? 0;
        $sortBy = $options['sortBy'] ?? 'created_at';
        $sortOrder = $options['sortOrder'] ?? 'desc';

        $this_uid = '';
        if(empty($where['reviewee_uid'])){
            $what_user = "reviewer_uid";
            $other_user = "reviewee_uid";
            $this_uid = strval($where['reviewer_uid']);
        }
        else{
            $what_user = "reviewee_uid";
            $other_user = "reviewer_uid";
            $this_uid = strval($where['reviewee_uid']);
        }

        $cond1 = "r.".$what_user." = $this_uid"." AND r.".$other_user." = r_sub.".$other_user." AND r.created_at = r_sub.max_date";
        $cond2 = "rm.".$other_user." = u.user_id";

        $query1 = $this->builder->select("$other_user, $what_user, MAX(created_at) as max_date")
                                ->where($what_user, $this_uid)
                                ->groupBy($other_user)
                                ->getCompiledSelect();

        $builder1 = $this->db->table('reviews AS r');
        $query2 = $builder1->select("r.review_id, r.reviewer_uid, r.reviewee_uid, 
                                    r.rating, r.content, r.created_at, r.updated_at")
                            ->join("($query1) as r_sub", $cond1)
                            ->getCompiledSelect();

        $builder2 = $this->db->table("($query2) as rm");
        return $builder2->select("rm.review_id, rm.reviewer_uid, rm.reviewee_uid, rm.rating, 
                                    rm.content, rm.created_at, rm.updated_at, u.username, u.photo_url")
                            ->join('user as u', $cond2)
                            ->orderBy($sortBy, $sortOrder)
                            ->get($limit, $offset)
                            ->getResultArray();
    }


    /* Update Methods */


    /**
     * Update the current user's review to a selected user.
     * 
     * @param array $data Data to be updated.
     * @param array $where Values that identify that review,
     * values to be used in the `where()` query.
     * 
     * **Must have:**
     * `[
     *      'reviewer_uid' => 'session_user', 
     *      'reviewee_uid' => 'that_user_id', 
     * ]`
     * 
     * @return true|false `true` If successful update otherwise, `false`.
     * 
     */
    public function update($data, $where) {
        if (empty($where['reviewer_uid']) || empty($where['reviewee_uid'])) throw new Exception("Both reviewer_uid and reviewee_uid should be given.");

        return $this->builder
                    ->where($where)
                    ->set($data)
                    ->update();
    }


    /* Delete Methods */


    /**
     * Delete a review.
     * 
     * @param array $where Values that identify that record,
     * values to be used in the `where()` query.
     * 
     * **Must atleast contain these data:**
     * `[
     *      'reviewer_uid' => 'session_user', 
     *      'reviewee_uid' => 'that_user_id', 
     * ]`
     * 
     * @param bool $purge ignore param, must be set to `false`.
     * 
     */
    public function delete($where, $purge = false){
        return $this->builder
                    ->where($where)
                    ->delete();
    }
    
}