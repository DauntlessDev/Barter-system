<?php

namespace App\Controllers;
use App\Models\ItemModel;
use App\Models\UserModel;
use Exception;

class Item extends BaseController
{
	protected $itemModel;
	protected $userModel;

	public function __construct()
	{
		$this->userModel = new UserModel();
		$this->itemModel = new ItemModel();
	}

	/**
	 * METHOD: GET
	*/
	public function index(int $item_id)
	{
		$item = $this->itemModel->find($item_id);
		$user = $this->userModel->find($item['poster_uid']);;

		$data = [
			'item' => $item,
			'user' => $user,
		];

		return view('pages/itemprofile', $data);
	}

	/**
	 * METHOD: GET
	*/
	public function delete(int $item_id)
	{
		$item = $this->itemModel->find($item_id);

		if ($item['poster_uid'] !== session()->get('user')['user_id']) {
			throw new Exception("You can't delete what's not yours :P");
		}

		$this->itemModel->delete(['item_id' => $item_id]);

		return redirect()
			   ->route('userProfile', [session()->get('user')['user_id']])
			   ->with('msg', "Item $item[item_name] has been deleted.");
	}
}
