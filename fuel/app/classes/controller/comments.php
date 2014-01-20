<?php
class Controller_Comments extends Controller_Template{

	public function action_index()
	{
		$data['comments'] = Model_Comment::find('all');
		$this->template->title = "Comments";
		$this->template->content = View::forge('comments/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('comments');

		if ( ! $data['comment'] = Model_Comment::find($id))
		{
			Session::set_flash('error', 'Could not find comment #'.$id);
			Response::redirect('comments');
		}

		$this->template->title = "Comment";
		$this->template->content = View::forge('comments/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Comment::validate('create');
			
			if ($val->run())
			{
				$comment = Model_Comment::forge(array(
					'message' => Input::post('message'),
					'author_id' => Input::post('author_id'),
					'news_id' => Input::post('news_id'),
				));

				if ($comment and $comment->save())
				{
					Session::set_flash('success', 'Added comment #'.$comment->id.'.');

					Response::redirect('comments');
				}

				else
				{
					Session::set_flash('error', 'Could not save comment.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('comments/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('comments');

		if ( ! $comment = Model_Comment::find($id))
		{
			Session::set_flash('error', 'Could not find comment #'.$id);
			Response::redirect('comments');
		}

		$val = Model_Comment::validate('edit');

		if ($val->run())
		{
			$comment->message = Input::post('message');
			$comment->author_id = Input::post('author_id');
			$comment->news_id = Input::post('news_id');

			if ($comment->save())
			{
				Session::set_flash('success', 'Updated comment #' . $id);

				Response::redirect('comments');
			}

			else
			{
				Session::set_flash('error', 'Could not update comment #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$comment->message = $val->validated('message');
				$comment->author_id = $val->validated('author_id');
				$comment->news_id = $val->validated('news_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('comment', $comment, false);
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('comments/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('comments');

		if ($comment = Model_Comment::find($id))
		{
			$comment->delete();

			Session::set_flash('success', 'Deleted comment #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete comment #'.$id);
		}

		Response::redirect('comments');

	}


}
