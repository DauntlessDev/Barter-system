<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ItemModel;
use App\Models\CategoryModel;
use Exception;
use Faker\Factory;

class ItemSeeder extends Seeder
{
	public function run()
	{
		$itemModel = new ItemModel();
		$faker = Factory::create();

		$itemData = [
			[
				'item_name' => "Nintendo Switch",
				'category_ids' => [ 1, 2 ]
			],
			[
				'item_name'    => "Yamaha DGX-660 88-key Piano",
				'category_ids' => [ 2, 10 ]
			],
			[
				'item_name'    => "Little Tikes Easy Score Basketball Set, Blue, 3 Balls",
				'category_ids' => [ 2, 8 ]
			],
			[
				'item_name'    => "Aqua 4-in-1 Monterey Hammock Inflatable Pool",
				'category_ids' => [ 2, 8 ]
			],
			[
				'item_name'    => "TOMY John Deere Sandbox Vehicle (2 Pack)",
				'category_ids' => [ 2, 8 ]
			],
			[
				'item_name'    => "Nerf N-Strike Elite Disruptor",
				'category_ids' => [ 2, 8 ]
			],
			[
				'item_name'    => "Water Sports 81055-7 Swim Thru Rings Assorted Pack",
				'category_ids' => [ 2, 8 ]
			],
			[
				'item_name'    => "BANZAI Bump N Bounce Body Bumpers N",
				'category_ids' => [ 2, 8 ]
			],
			[
				'item_name'    => "Gazillion Bubbles Hurricane Machine",
				'category_ids' => [ 2, 8 ]
			],
			[
				'item_name'    => "Fire 7 tablet (7\" display, 16 GB)",
				'category_ids' => [ 3, 6, 9 ]
			],
			[
				'item_name'    => "Lenovo Chromebook Flex 5 13\" Laptop",
				'category_ids' => [ 3, 6, 9 ]
			],
			[
				'item_name'    => "Expanding Organizer File Folder, Letter Size",
				'category_ids' => [ 6, 9 ]
			],
			[
				'item_name'    => "Matein Travel Laptop Backpack",
				'category_ids' => [ 6, 9 ]
			],
			[
				'item_name'    => "Tombow Fudenosuke Brush Pens (2-Pack)",
				'category_ids' => [ 6, 9 ]
			],
			[
				'item_name'    => "Furinno Pasir 3-Tier Open Shelf, Espresso",
				'category_ids' => [ 6, 9 ]
			],
			[
				'item_name'    => "X-ACTO School Pro Classroom Electric Pencil Sharpener",
				'category_ids' => [ 6, 9 ]
			],
			[
				'item_name'    => "Apple EarPods with Lightning Connector - White",
				'category_ids' => [ 2, 3, 4 ]
			],
			[
				'item_name'    => "Victrola Vintage 3-Speed Bluetooth Portable Suitcase Record Player with Built-in Speakers",
				'category_ids' => [ 2, 3, 5 ]
			],
			[
				'item_name'    => "Michael Kors Men's Slim Runway Stainless Steel Quartz Watch",
				'category_ids' => [10]
			],
			[
				'item_name'    => "Nintendo Switch Pro Controller",
				'category_ids' => [ 2, 3 ]
			],
			[
				'item_name'    => "Columbia Men's Steens Mountain Full Zip 2.0 Fleece",
				'category_ids' => [1]
			],
			[
				'item_name'    => "Columbia Men's Newton Ridge Plus II Waterproof Hiking Boot",
				'category_ids' => [1]
			],
			[
				'item_name'    => "Columbia mens Ascender Softshell Front-zip Jacket",
				'category_ids' => [1]
			],
			[
				'item_name'    => "Lysol Laundry Sanitizer Additive",
				'category_ids' => [5]
			],
			[
				'item_name'    => "Beckham Hotel Collection Bed Pillows for Sleeping - Queen Size",
				'category_ids' => [5]
			],
			[
				'item_name'    => "Sofa bed fabric double size bed",
				'category_ids' => [5]
			],
			[
				'item_name'    => "Pull&Bear Drape Top",
				'category_ids' => [1]
			],
			[
				'item_name'    => "Naruto funko pop and pikachu",
				'category_ids' => [2, 7]
			],
			[
				'item_name'    => "Xyclone Bike Foldable",
				'category_ids' => [7]
			],
			[
				'item_name'    => "Basketball Board Set",
				'category_ids' => [10, 7]
			],
			[
				'item_name'    => "Bennet Mountain bike",
				'category_ids' => [10, 7]
			],
			[
				'item_name'    => "Adidas Starlancer V Soccer Ball",
				'category_ids' => [2, 7]
			],
			[
				'item_name'    => "Sewing machine",
				'category_ids' => [4, 5]
			],
			[
				'item_name'    => "Portable aircon",
				'category_ids' => [4, 5]
			],
			[
				'item_name'    => "Panasonic Outlet",
				'category_ids' => [4, 5]
			],
			[
				'item_name'    => "MXQ PRO TV blackbox",
				'category_ids' => [4, 5]
			],
			[
				'item_name'    => "LG Aircon ",
				'category_ids' => [4, 5]
			],
			[
				'item_name'    => "Dyson style digital V6",
				'category_ids' => [4, 5]
			],
			[
				'item_name'    => "Huawei GT2 Watch",
				'category_ids' => [3]
			],
		];

		foreach($itemData as $item){
			$product_num = rand(1, 3);
			$data = [
					'poster_uid'   => rand(1, 15),
					'item_name'    => $item['item_name'],
					'photo_url'    => "images/default/product$product_num.jpg",
					'avail_status' => 'available',
					'desc_title'   => $faker->word,
					'desc_content' => $faker->text,
				];

			if ($itemModel->create($data, $item['category_ids']) === false) {
					throw new Exception('Error while inserting using ItemModel|'.implode('|', $itemModel->errors()));
			}
		}
		
	}
}
