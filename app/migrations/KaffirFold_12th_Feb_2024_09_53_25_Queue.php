<?php

/**
 * Queue Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Queue extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('patient varchar(30) DEFAULT NULL');
		$this->addColumn('status varchar(128) DEFAULT "Queuing at the Reception Area"');
		$this->addColumn('created_by varchar(30) DEFAULT NULL');
		$this->addColumn('updated_by varchar(30) DEFAULT NULL');
		
		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');

		$this->addPrimaryKey('id');
		
		 # You may add/list your table's keys and unique keys below

		$this->addKey('patient');
		$this->addKey('status');
		$this->addKey('date_created');
		
		// $this->addUniqueKey('key/column');

		/*Create Table*/
		$this->createTable('queue');
    }

    public function omega()
    {
        $this->dropTable('queue');
    }
}
