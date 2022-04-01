<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Ramsey\Uuid\Uuid;

class SystemSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_settings')->insert(
        	[
                //SMTP
	        	[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
                    'lang'				=>	'email',
		        	'name'				=>	'host',
		        	'type'				=>	'smtp',
		            'value' 			=>	'text',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
                    'lang'				=>	'email',
		        	'name'				=>	'port',
		        	'type'				=>	'smtp',
		            'value' 			=>	'number',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
		        	'lang'				=>	'email',
                    'name'				=>	'encryption',
		        	'type'				=>	'smtp',
		            'value' 			=>	'text',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
		        	'lang'				=>	'email',
                    'name'				=>	'username',
		        	'type'				=>	'smtp',
		            'value' 			=>	'text',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
		        	'lang'				=>	'email',
                    'name'				=>	'password',
		        	'type'				=>	'smtp',
		            'value' 			=>	'password',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
                //MailGun
	        	[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
		        	'lang'				=>	'email',
                    'name'				=>	'domain',
		        	'type'				=>	'mailgun',
		            'value' 			=>	'text',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
		        	'lang'				=>	'email',
                    'name'				=>	'secret',
		        	'type'				=>	'mailgun',
		            'value' 			=>	'text',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
		        	'lang'				=>	'email',
                    'name'				=>	'endpoint',
		        	'type'				=>	'mailgun',
		            'value' 			=>	'text',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
                //Postmark
	        	[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
		        	'lang'				=>	'email',
                    'name'				=>	'token',
		        	'type'				=>	'postmark',
		            'value' 			=>	'text',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
                //Ses
				[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
		        	'lang'				=>	'email',
                    'name'				=>	'key',
		        	'type'				=>	'ses',
		            'value' 			=>	'text',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
				[
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
		        	'lang'				=>	'email',
                    'name'				=>	'secret',
		        	'type'				=>	'ses',
		            'value' 			=>	'text',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
                [
		        	'uuid'			    =>	Uuid::getFactory()->uuid4(),
		        	'lang'				=>	'email',
                    'name'				=>	'region',
		        	'type'				=>	'ses',
		            'value' 			=>	'text',
		            'created_at'		=>	date("Y-m-d H:i:s"),
	        	],
        	]
    	);
    }
}
