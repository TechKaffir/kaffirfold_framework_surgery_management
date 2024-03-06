<?php

/**
 * Claims Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Claims extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('patient int(10) unsigned DEFAULT NULL');
		$this->addColumn('consultation_date date DEFAULT NULL');
		$this->addColumn('claim_date date DEFAULT NULL');
		$this->addColumn('note text DEFAULT NULL');
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		

		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		
		 # You may add/list your table's keys and unique keys below

		$this->addKey('patient');
		$this->addKey('consultation_date');
		$this->addKey('claim_date');
		// $this->addUniqueKey('key/column');
		
		$this->createTable('claims');

		/** insert data **/
		# if you wish tp immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		// $this->addData('key','value');
		// $this->insertData('claims')
    }

    public function omega()
    {
        $this->dropTable('claims');
    }
}
