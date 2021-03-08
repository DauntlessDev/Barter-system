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
        print_r($userModel->get(['username' => ['user0']])); // filter user by username
    ?>
    </pre>
</details>

<hr>

<details>
    <summary>Offer Model</summary>
    <pre>
    <?php
        print_r($offerModel->get([
            'item_id' => 1,
            'poster_uid' => 1,
            'customer_uid' => 4,
        ])); // get Offer
    ?>
    </pre>
</details>