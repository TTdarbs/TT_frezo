<?php
use Orm\Model;

class Model_News extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'summary',
		'message',
		'author_id',
		'created_at',
		'updated_at',
                'image',
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
        
        protected static $_belongs_to = array( // relācija uz user
	'user' => array(
			'key_from' => 'author_id',
			'model_to' => 'Model_User',
			'key_to' => 'id')
        );
        
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('summary', 'Summary', 'required');
		$val->add_field('message', 'Message', 'required');
		$val->add_field('author_id', 'Author Id', 'required|valid_string[numeric]');
                

		return $val;
	}

}
