<?php

/**
 * Pharmacy Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Pharmacy extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('patient int(10) unsigned DEFAULT NULL');
		$this->addColumn('date datetime DEFAULT current_timestamp()');
		$this->addColumn('actual text DEFAULT NULL');
		$this->addColumn('notes tinytext DEFAULT NULL');
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		
		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		
		 # You may add/list your table's keys and unique keys below

		$this->addKey('patient');
		$this->addKey('date');
		// $this->addUniqueKey('key/column');
		
		$this->createTable('pharmacy');

		/** insert data **/
		# if you wish tp immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		// $this->addData('key','value');
		// $this->insertData('pharmacy');
    }

    public function omega()
    {
        $this->dropTable('pharmacy');
    }
}
