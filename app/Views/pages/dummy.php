<details>
    <summary>Item Model</summary>
    <pre>
    <?php
        // print_r($itemModel->get());
        print_r($itemModel->get(['item_name' => ['item0']])); // get all items with categories
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
    <summary>Category Model</summary>
    <pre>
    <?php
        print_r($categoryModel->get()); // GET ALL category with items
        // print_r($categoryModel->get([], ['limit' => 1, 'offset' => 0, 'sortOrder' => 'desc'])); // GET all category with filters
        // print_r($categoryModel->get(['category_name' => ['fashion', 'hardware']])); // filter categories by name
    ?>
    </pre>
</details>