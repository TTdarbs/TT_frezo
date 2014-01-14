<?php

namespace Fuel\Migrations;

class User_data
{
	public function up()
	{
	    // admin account: 100 - admin
		\Auth::instance()->create_user(
			"admin@frezo.lv", //username = email
			"password",
			"admin@frezo.lv",
			100, //admin
			array(	"verified" => true,
					"verification_key" => md5(mt_rand(0, mt_getrandmax())),
					'name' => 'Ivars',
					'surname' => 'Stinkevičs'
				)
		);
			
		// test user account: 1 - user
		\Auth::instance()->create_user(
			"user@frezo.lv", //username = email
			"password",
			"user@frezo.lv",
			1, //user
			array(	"verified" => true,
					"verification_key" => md5(mt_rand(0, mt_getrandmax())),
					'name' => 'Jānis',
					'surname' => 'Bērziņš'
				)
		);
	    
	    
	}

	public function down()
	{
		\DBUtil::truncate_table('users');
	}
}