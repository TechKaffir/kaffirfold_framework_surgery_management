<?php

/**
 * SickNote Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class SickNote extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('id int(10) unsigned NOT NULL AUTO_INCREMENT');
		$this->addColumn('title_1 varchar(40) DEFAULT NULL');
		$this->addColumn('patient int(10) unsigned DEFAULT NULL');
		$this->addColumn('employment_number varchar(40) DEFAULT NULL');
		$this->addColumn('cons_date date DEFAULT NULL');
		$this->addColumn('cons_time time DEFAULT NULL');
		$this->addColumn('title_2 varchar(40) DEFAULT NULL');
		$this->addColumn('title_3 varchar(40) DEFAULT NULL');
		$this->addColumn('sick_from_date date DEFAULT NULL');
		$this->addColumn('clinical_diagnosis text DEFAULT NULL');
		$this->addColumn('title_4 varchar(40) DEFAULT NULL');
		$this->addColumn('fit_date date DEFAULT NULL');
		$this->addColumn('remarks text DEFAULT NULL');
		$this->addColumn('date_of_issue date DEFAULT NULL');
		$this->addColumn('label varchar(50) DEFAULT NULL');
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		
		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		
		 # You may add/list your table's keys and unique keys below

		$this->addKey('patient');
		$this->addKey('employment_number');
		$this->addKey('cons_date');
		$this->addKey('sick_from_date');
		$this->addKey('fit_date');
		$this->addKey('date_of_issue');
		$this->addKey('label');
		// $this->addUniqueKey('key/column');
		
		$this->createTable('sick_certificate');

		/** insert data **/
		# if you wish tp immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		// $this->addData('key','value');
		// $this->insertData('sick_certificate');
    }

    public function omega()
    {
        $this->dropTable('sick_certificate');
    }
}
