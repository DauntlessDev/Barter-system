<?php

namespace App\Controllers;
use App\Models\ItemModel;
use App\Models\OfferModel;
use Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;

class Offer extends BaseController
{
	protected $itemModel;

	public function __construct()
	{
		helper(['form']);
		$this->validation = Services::validation();
		$this->itemModel = new ItemModel();
		$this->offerModel = new OfferModel();
	}

    public function create(int $item_id)
	{
		$user_id = session()->get('user')['user_id'];
		$item = $this->itemModel->find($item_id);
		if(!$item) throw PageNotFoundException::forPageNotFound('Item does not exist');
		if($item['poster_uid'] === $user_id) throw PageNotFoundException::forPageNotFound('You cannot place offer to your own item.');

        if ($this->request->getMethod() === 'get') return view('pages/auth/placeOffer', ['item_id' => $item_id]);
		if ($this->request->getMethod() === 'post') {
			$rules = $this->validation->getRuleGroup('addOffer');

			if (!$this->validate($rules)) return view('pages/auth/placeOffer', ['validation' => $this->validator, 'item_id' => $item_id]);

			$_POST['item_id'] = $item_id;
			$_POST['customer_uid'] = $user_id;

			// check for validation error
			if ($this->offerModel->create($_POST) === false) {
				throw new Exception('Error while inserting using OfferModel');
			}

			return redirect()->route('item', [$item['item_id']])->with('msg', 'Offer placed successfully!');
		}
	}
}