<?php
use Orm\Model;

class Model_Comment extends Model
{
	protected static $_properties = array(
		'id',
		'message',
		'author_id',
		'news_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
        
            protected static $_belongs_to = 
			array(
			    'news' => array(
				'key_from' => 'news_id',
				'model_to' => 'Model_News',
				'key_to' => 'id'),
                            'user' => array(
				'key_from' => 'author_id',
				'model_to' => 'Model_User',
				'key_to' => 'id')
			);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('message', 'Message', 'required');
		$val->add_field('author_id', 'Author Id', 'required|valid_string[numeric]');
		$val->add_field('news_id', 'News Id', 'required|valid_string[numeric]');

		return $val;
	}

}
