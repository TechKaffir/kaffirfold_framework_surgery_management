<?php

/**
 * Followup Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Followup extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('patient int(11) NOT NULL');
		$this->addColumn('modus varchar(20) NOT NULL');
		$this->addColumn('intention varchar(100) NOT NULL');
		$this->addColumn('report text NOT NULL');
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');		

		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		
		 # You may add/list your table's keys and unique keys below

		$this->addKey('patient');
		$this->addKey('modus');
		$this->addKey('intention');
		
		$this->createTable('followup');
    }

    public function omega()
    {
        $this->dropTable('followup');
    }
}
