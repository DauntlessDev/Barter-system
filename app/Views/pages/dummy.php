<details>
    <summary>Item Model</summary>
    <pre>
    <?php
        // print_r($itemModel->get());
        print_r($itemModel->get(['item_name' => ['item0']])); // get all items with categories

        // $data = [
        //     'item_name' => 'updated item',
        //     'category_id' => 2,
        //     'new_category_id' => 3,
        // ];
        // print_r($itemModel->update(1, $data)); // get all items with categories

        // print_r($itemModel->delete(['item_name' => 'item1']));
    ?>
    </pre>
</details>

<hr>

<details>
    <summary>Category Model</summary>
    <pre>
    <?php
        print_r($categoryModel->get()); // GET ALL category with items
        // print_r($categoryModel->get([], ['limit' => 1, 'offset' => 0, 'sortOrder' => 'desc'])); // GET all category with filters
        // print_r($categoryModel->get(['category_name' => ['fashion', 'hardware']])); // filter categories by name
    ?>
    </pre>
</details>

<hr>

<details>
    <summary>User Model</summary>
    <pre>
    <?php
        // print_r($userModel->get()); // GET ALL users
        // print_r($userModel->get(['username' => ['user0']])); // filter user by username
        print_r($userModel->update(1, ['first_name' => 'TEST'])); // filter user by username
    ?>
    </pre>
</details>

<hr>

<details>
    <summary>Offer Model</summary>
    <pre>
    <?php
    print_r($offerModel->get()); // get All Offer
    // print_r($offerModel->get([
    //     'item_id' => 1,
    //     'poster_uid' => 1,
    //     'customer_uid' => 4,
    // ])); // get Single Offer
    ?>
    </pre>
</details>

<hr>

<details>
    <summary>Review Model</summary>
    <pre>
    <?php
        print_r($reviewModel->get()); // All Review
        // print_r($reviewModel->get([
        //     'reviewer_uid' => 1,
        // ])); // get all Reviewed
        // print_r($reviewModel->get([
        //     'reviewee_uid' => 2,
        // ])); // get all Reviews
        // print_r($reviewModel->get([
        //     'reviewer_uid' => 1,
        //     'reviewee_uid' => 2,
        // ])); // get specific Reviews
    ?>
    </pre>
</details>

<hr>

<details>
    <summary>Message Model</summary>
    <pre>
    <?php
        print_r($messageModel->getMessagesWith(['sender_uid' => 1, 'recipient_uid' => 2])); // Get conversation between two user
        // print_r($messageModel->getAllRecentMessages(['recipient_uid' => 1])); // Get all recent messages (recipient_uid must be the current logged in user)
    ?>
    </pre>
</details>