<?php
use Orm\Model;

class Model_About extends Model
{
	protected static $_properties = array(
		'id',
		'title_desc',
		'desc_desc',
		'title_history',
		'desc_history',
		'title_vision',
		'desc_vision',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title_desc', 'Title Desc', 'required|max_length[255]');
		$val->add_field('desc_desc', 'Desc Desc', 'required');
		$val->add_field('title_history', 'Title History', 'required|max_length[255]');
		$val->add_field('desc_history', 'Desc History', 'required');
		$val->add_field('title_vision', 'Title Vision', 'required|max_length[255]');
		$val->add_field('desc_vision', 'Desc Vision', 'required');

		return $val;
	}

}
