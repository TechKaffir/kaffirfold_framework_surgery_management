<?php

/**
 * Referrals Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Referrals extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/
		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('Date datetime default current_timestamp()');
		$this->addColumn('Patient int(10) unsigned DEFAULT NULL');
		$this->addColumn('Med_Centre varchar(40) DEFAULT NULL');
		$this->addColumn('Type_of_treatment varchar(40) DEFAULT NULL');
		$this->addColumn('Status varchar(40) DEFAULT NULL');
		$this->addColumn('Message text DEFAULT NULL');

		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		
		 # You may add/list your table's keys and unique keys below

		$this->addKey('Date');
		$this->addKey('Patient');
		$this->addKey('Med_Centre');
		$this->addKey('Type_of_treatment');
		$this->addKey('Status');
		// $this->addUniqueKey('key/column');
		
		$this->createTable('referrals');

		/** insert data **/
		# if you wish tp immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		// $this->addData('key','value');
		// $this->insertData('referrals');
    }

    public function omega()
    {
        $this->dropTable('referrals');
    }
}
