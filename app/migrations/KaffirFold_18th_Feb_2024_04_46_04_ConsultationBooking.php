<?php

/**
 * ConsultationBooking Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class ConsultationBooking extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('patient int(10) unsigned DEFAULT NULL');
		$this->addColumn('reg_date date NOT NULL DEFAULT current_timestamp()');
		$this->addColumn('reg_time time NOT NULL DEFAULT current_timestamp()');
		$this->addColumn('cash_or_medical varchar(40) DEFAULT NULL');
		$this->addColumn('funds_status varchar(20) NOT NULL DEFAULT "Minimal Funds"');
		$this->addColumn('status varchar(30) NOT NULL DEFAULT "Queuing at Reception"');
		$this->addColumn('Notes text DEFAULT NULL');
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		

		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		
		 # You may add/list your table's keys and unique keys below

		$this->addKey('patient');
		$this->addKey('reg_date');
		$this->addKey('reg_time');
		$this->addKey('cash_or_medical');
		$this->addKey('funds_status');
		$this->addKey('status');
		$this->addKey('status');
		// $this->addUniqueKey('key/column');
		
		$this->createTable('consultation_booking');

		/** insert data **/
		# if you wish tp immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		// $this->addData('key','value');
		// $this->insertData('consultation_booking')
    }

    public function omega()
    {
        $this->dropTable('consultation_booking');
    }
}
