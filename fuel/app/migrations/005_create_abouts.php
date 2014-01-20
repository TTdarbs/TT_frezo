<?php

namespace Fuel\Migrations;

class Create_abouts
{
	public function up()
	{
		\DBUtil::create_table('abouts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title_desc' => array('constraint' => 255, 'type' => 'varchar'),
			'desc_desc' => array('type' => 'text'),
			'title_history' => array('constraint' => 255, 'type' => 'varchar'),
			'desc_history' => array('type' => 'text'),
			'title_vision' => array('constraint' => 255, 'type' => 'varchar'),
			'desc_vision' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('abouts');
	}
}