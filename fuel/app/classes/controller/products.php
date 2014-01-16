<?php
class Controller_Products extends Controller_Template{
    

	public function action_index()
	{
		$data['products'] = Model_Product::find('all');
		$this->template->title = "Products";
		$this->template->content = View::forge('products/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('products');

		if ( ! $data['product'] = Model_Product::find($id))
		{
			Session::set_flash('error', 'Could not find product #'.$id);
			Response::redirect('products');
		}

		$this->template->title = "Product";
		$this->template->content = View::forge('products/view', $data);

	}

	public function action_create()
	{
            
		if (Input::method() == 'POST')
		{
                    $user = \Auth::get_user_id();
                    $config = array( // atļautie tipi un bilžu atrašanās vieta
                        'path' => DOCROOT.'assets/img/products',
                        'randomize' => true,
                        'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
                    );
                    Upload::process($config); // ielādējam iepriekšo configu
                    if(Upload::is_valid()) { // pārbaudam vai ir derīga
                        Upload::save(); // ja der, saglabājam un pārbaudam formu
                        $files = Upload::get_files(); // iegūstam faila saturu saitei uz to
                        $val = Model_Product::validate('create');
			if ($val->run())
			{
                                
                                
				$product = Model_Product::forge(array(
					'name' => Input::post('name'),
					'summary' => Input::post('summary'),
					'price' => Input::post('price'),
					'author_id' => ($user[1]),
                                        'image' => ($files[0]['saved_as']),
				));

				if ($product and $product->save())
				{
					Session::set_flash('success', 'Added product #'.$product->id.'.');

					Response::redirect('products');
				}

				else
				{
					Session::set_flash('error', 'Could not save product.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
                    }else{
                            Session::set_flash('error', 'Attēls nav derīgs');
                    };
                };

		$this->template->title = "Products";
		$this->template->content = View::forge('products/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('products');

		if ( ! $product = Model_Product::find($id))
		{
			Session::set_flash('error', 'Could not find product #'.$id);
			Response::redirect('products');
		}

		$val = Model_Product::validate('edit');

		if ($val->run())
		{
			$product->name = Input::post('name');
			$product->summary = Input::post('summary');
			$product->price = Input::post('price');
			$product->image = Input::post('image');
			$product->author_id = Input::post('author_id');

			if ($product->save())
			{
				Session::set_flash('success', 'Updated product #' . $id);

				Response::redirect('products');
			}

			else
			{
				Session::set_flash('error', 'Could not update product #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$product->name = $val->validated('name');
				$product->summary = $val->validated('summary');
				$product->price = $val->validated('price');
				$product->image = $val->validated('image');
				$product->author_id = $val->validated('author_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('product', $product, false);
		}

		$this->template->title = "Products";
		$this->template->content = View::forge('products/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('products');

		if ($product = Model_Product::find($id))
		{
			$product->delete();

			Session::set_flash('success', 'Deleted product #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete product #'.$id);
		}

		Response::redirect('products');

	}


}
