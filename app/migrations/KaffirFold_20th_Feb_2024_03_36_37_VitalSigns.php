<?php

/**
 * VitalSigns Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class VitalSigns extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('sign_ID int(10) unsigned NOT NULL AUTO_INCREMENT');
		$this->addColumn('date date DEFAULT NULL');
		$this->addColumn('patient int(10) unsigned DEFAULT NULL');
		$this->addColumn('blood_sugar varchar(40) DEFAULT NULL');
		$this->addColumn('blood_pressure varchar(40) DEFAULT NULL');
		$this->addColumn('pulse_rate varchar(40) DEFAULT NULL');
		$this->addColumn('urinalysis varchar(40) DEFAULT NULL');
		$this->addColumn('pregnancy_test varchar(40) DEFAULT NULL');
		$this->addColumn('resting_ecg varchar(40) DEFAULT NULL');
		$this->addColumn('oxygen_saturation varchar(40) DEFAULT NULL');
		$this->addColumn('weight varchar(40) DEFAULT NULL');
		$this->addColumn('height varchar(40) DEFAULT NULL');
		$this->addColumn('temperature varchar(40) DEFAULT NULL');
		$this->addColumn('BMI varchar(40) DEFAULT NULL');
		$this->addColumn('comments longtext DEFAULT NULL');
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		
		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('sign_ID');
		
		 # You may add/list your table's keys and unique keys below

		$this->addKey('date');
		$this->addKey('patient');

		// $this->addUniqueKey('key/column');
		
		$this->createTable('vital_signs');

		/** insert data **/
		# if you wish to immediately add data to your table from here, you can do that by listing repeating the addData function, passing the relevant key and value.
		// $this->addData('key','value');
		// $this->insertData('vital_signs');
    }

    public function omega()
    {
        $this->dropTable('vital_signs');
    }
}
