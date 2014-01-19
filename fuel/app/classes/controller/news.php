<?php
class Controller_News extends Controller_Template{

	public function action_index()
	{
                $data['news'] = Model_News::find('all',array(
                        "order_by" => array("created_at" => "desc")
                        ));
                $data['products'] = Model_Product::find('all',array(
                        "order_by" => array("created_at" => "desc")
                        ));
		
		$this->template->title = "News";
		$this->template->content = View::forge('news/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('news');

		if ( ! $data['news'] = Model_News::find($id))
		{
			Session::set_flash('error', 'Could not find news #'.$id);
			Response::redirect('news');
		}

		$this->template->title = "News";
		$this->template->content = View::forge('news/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
                    $user = \Auth::get_user_id();
                    $config = array( // atļautie tipi un bilžu atrašanās vieta
                        'path' => DOCROOT.'assets/img/news',
                        'randomize' => true,
                        'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
                    );
                    Upload::process($config); // ielādējam iepriekšo configu
                    if(Upload::is_valid()) { // pārbaudam vai ir derīga
                        Upload::save(); // ja der, saglabājam un pārbaudam formu
                        $files = Upload::get_files(); // iegūstam faila saturu saitei uz to
                        #$files[0]['saved_to'].$files[0]['saved_as'] 
                        $val = Model_News::validate('create');
			
			if ($val->run())
			{
				$news = Model_News::forge(array(
					'name' => Input::post('name'),
					'summary' => Input::post('summary'),
					'message' => Input::post('message'),
					'author_id' => ($user[1]),
                                        'image' => ($files[0]['saved_as']),
				));

				if ($news and $news->save())
				{
					Session::set_flash('success', 'Added news #'.$news->id.'.');

					Response::redirect('news');
				}

				else
				{
					Session::set_flash('error', 'Could not save news.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
                             
                        
                    }else{
                        Session::set_flash('error', 'Attēls nav derīgs');
                    }
        }
                


		$this->template->title = "News";
		$this->template->content = View::forge('news/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('news');

		if ( ! $news = Model_News::find($id))
		{
			Session::set_flash('error', 'Could not find news #'.$id);
			Response::redirect('news');
		}

		$val = Model_News::validate('edit');

		if ($val->run())
		{
			$news->name = Input::post('name');
			$news->summary = Input::post('summary');
			$news->message = Input::post('message');
			$news->author_id = Input::post('author_id');

			if ($news->save())
			{
				Session::set_flash('success', 'Updated news #' . $id);

				Response::redirect('news');
			}

			else
			{
				Session::set_flash('error', 'Could not update news #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$news->name = $val->validated('name');
				$news->summary = $val->validated('summary');
				$news->message = $val->validated('message');
				$news->author_id = $val->validated('author_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('news', $news, false);
		}

		$this->template->title = "News";
		$this->template->content = View::forge('news/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('news');

		if ($news = Model_News::find($id))
		{
                        File::delete(DOCROOT.'/assets/img/news/'.$news->image);
			$news->delete();

			Session::set_flash('success', 'Izdzēsts jaunums #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Nevarēja izdzēst #'.$id);
		}

		Response::redirect('news');

	}


}
