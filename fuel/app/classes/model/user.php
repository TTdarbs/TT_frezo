<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'last_login',
		'login_hash',
		'profile_fields',
		'created_at',
		'updated_at',
	);
        
        protected static $_has_many = array( // katram lietotājam vairākas ziņas
            'news' => array(
                'key_from' => 'id',
                'model_to' => 'Model_News',
                'key_to' => 'author_id',
                'cascade_save' => true,
                'cascade_delete' => false),
            'products' => array(
                'key_from' => 'id',
                'model_to' => 'Model_Product',
                'key_to' => 'author_id',
                'cascade_save' => true,
                'cascade_delete' => false),
            'comments' => array(
                'key_from' => 'id',
                'model_to' => 'Model_Comment',
                'key_to' => 'author_id',
                'cascade_save' => true,
                'cascade_delete' => false),
    );

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'users';

}
