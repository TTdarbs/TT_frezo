<?php
class Controller_About extends Controller_Template{

	public function action_index()
	{
		$data['abouts'] = Model_About::find('all');
		$this->template->title = "Abouts";
		$this->template->content = View::forge('about/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('about');

		if ( ! $data['about'] = Model_About::find($id))
		{
			Session::set_flash('error', 'Could not find about #'.$id);
			Response::redirect('about');
		}

		$this->template->title = "About";
		$this->template->content = View::forge('about/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_About::validate('create');
			
			if ($val->run())
			{
				$about = Model_About::forge(array(
					'title_desc' => Input::post('title_desc'),
					'desc_desc' => Input::post('desc_desc'),
					'title_history' => Input::post('title_history'),
					'desc_history' => Input::post('desc_history'),
					'title_vision' => Input::post('title_vision'),
					'desc_vision' => Input::post('desc_vision'),
				));

				if ($about and $about->save())
				{
					Session::set_flash('success', 'Added about #'.$about->id.'.');

					Response::redirect('about');
				}

				else
				{
					Session::set_flash('error', 'Could not save about.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Abouts";
		$this->template->content = View::forge('about/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('about');

		if ( ! $about = Model_About::find($id))
		{
			Session::set_flash('error', 'Could not find about #'.$id);
			Response::redirect('about');
		}

		$val = Model_About::validate('edit');

		if ($val->run())
		{
			$about->title_desc = Input::post('title_desc');
			$about->desc_desc = Input::post('desc_desc');
			$about->title_history = Input::post('title_history');
			$about->desc_history = Input::post('desc_history');
			$about->title_vision = Input::post('title_vision');
			$about->desc_vision = Input::post('desc_vision');

			if ($about->save())
			{
				Session::set_flash('success', 'Updated about #' . $id);

				Response::redirect('about');
			}

			else
			{
				Session::set_flash('error', 'Could not update about #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$about->title_desc = $val->validated('title_desc');
				$about->desc_desc = $val->validated('desc_desc');
				$about->title_history = $val->validated('title_history');
				$about->desc_history = $val->validated('desc_history');
				$about->title_vision = $val->validated('title_vision');
				$about->desc_vision = $val->validated('desc_vision');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('about', $about, false);
		}

		$this->template->title = "Abouts";
		$this->template->content = View::forge('about/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('about');

                if (Auth::has_access("about.delete")){    
                
                    if ($about = Model_About::find($id))
                    {
                            $about->delete();

                            Session::set_flash('success', 'Deleted about #'.$id);
                    }

                    else
                    {
                            Session::set_flash('error', 'Could not delete about #'.$id);
                    }

                    Response::redirect('about');
                    
                }else{
                     Session::set_flash('error', "Tu nedrīksti to darīt!");
                     Response::redirect('about');
                }

	}


}
