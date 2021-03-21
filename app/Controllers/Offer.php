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
	protected $user_id;

	public function __construct()
	{
		helper(['form']);
		$this->validation = Services::validation();
		$this->itemModel = new ItemModel();
		$this->offerModel = new OfferModel();
		$this->user_id = session()->get('user')['user_id'];
	}

    public function create(int $item_id)
	{
		$item = $this->itemModel->find($item_id);
		$this->verifyItemExistence($item);
		if($item['poster_uid'] === $this->user_id) throw PageNotFoundException::forPageNotFound('You cannot place offer to your own item.');

		$canPlaceOffer = count($this->offerModel->get(['customer_uid' => $this->user_id, 'item_id' => $item_id])) == 0;
		if(!$canPlaceOffer) throw PageNotFoundException::forPageNotFound('You cannot another offer.');

        if ($this->request->getMethod() === 'get') return view('pages/auth/placeOffer', ['item_id' => $item_id, 'canPlaceOffer' => $canPlaceOffer]);
		if ($this->request->getMethod() === 'post') {
			$rules = $this->validation->getRuleGroup('addOffer');

			if (!$this->validate($rules)) return view('pages/auth/placeOffer', ['validation' => $this->validator, 'item_id' => $item_id]);

			$_POST['item_id'] = $item_id;
			$_POST['customer_uid'] = $this->user_id;

			// check for validation error
			if ($this->offerModel->create($_POST) === false) {
				throw new Exception('Error while inserting using OfferModel');
			}

			// update avail_status
			if ($this->itemModel->update($item['item_id'], ['avail_status' => 'pending']) === false) {
				throw new Exception('Error while updating item status');
			}

			return redirect()->route('item', [$item['item_id']])->with('msg', 'Offer placed successfully!');
		}
	}


	public function accept(int $item_id) {
		$item = $this->itemModel->find($item_id);
		if($item['poster_uid'] !== $this->user_id) {
			throw PageNotFoundException::forPageNotFound('You do not have permission to accept this offer.');
		}
		$this->verifyItemExistence($item);

		if ($this->itemModel->update($item['item_id'], ['avail_status' => 'unavailable']) === false) {
			throw new Exception('Error while updating item status');
		}

		return redirect()->route('item', [$item['item_id']])->with('msg', 'Offer accepted!');
	}

	private function verifyItemExistence($item) {
		if(!$item) throw PageNotFoundException::forPageNotFound('Item does not exist');
	}
}