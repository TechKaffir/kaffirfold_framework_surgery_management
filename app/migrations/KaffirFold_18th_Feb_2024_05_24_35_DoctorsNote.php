<?php

/**
 * DoctorsNote Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class DoctorsNote extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('note_ID int(10) unsigned NOT NULL AUTO_INCREMENT');
		$this->addColumn('date date DEFAULT NULL');
		$this->addColumn('Time time DEFAULT NULL');
		$this->addColumn('patient int(10) unsigned DEFAULT NULL');
		$this->addColumn('Clan_Name int(10) unsigned DEFAULT NULL');
		$this->addColumn('age int(10) unsigned DEFAULT NULL');
		$this->addColumn('Relevant_History tinytext DEFAULT NULL');
		$this->addColumn('Comobidities tinytext DEFAULT NULL');
		$this->addColumn('Clinical_Examination tinytext DEFAULT NULL');		
		$this->addColumn('Diagnosis tinytext DEFAULT NULL');		
		$this->addColumn('Plan text DEFAULT NULL');	
		$this->addColumn('Return_Date date DEFAULT NULL');	
		$this->addColumn('Note text DEFAULT NULL');	

		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		
		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('note_ID');
		
		 # You may add/list your table's keys and unique keys below

		$this->addKey('date');
		$this->addKey('Time');
		$this->addKey('patient');
		$this->addKey('Clan_Name');
		$this->addKey('Return_Date');

		// $this->addUniqueKey('key/column');
		
		$this->createTable('doctors_note');

		/** insert data **/
		# if you wish tp immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		// $this->addData('key','value');
		// $this->insertData('doctors_note')
    }

    public function omega()
    {
        $this->dropTable('doctors_note');
    }
}
