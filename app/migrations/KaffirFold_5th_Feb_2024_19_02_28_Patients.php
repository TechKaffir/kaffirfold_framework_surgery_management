<?php

/**
 * Patients Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Patients extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/
		/** Add more table columns below this id column*/
		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		# Start Added Data
		$this->addColumn('File_Number int(11) NULL');
		$this->addColumn('Surname varchar(40) NOT NULL');
		$this->addColumn('First_Name varchar(40) NOT NULL');
		$this->addColumn('identity_number varchar(13) NOT NULL');
		$this->addColumn('Clan_Name varchar(40) NULL');
		$this->addColumn('occupation varchar(40) NULL');
		$this->addColumn('date_of_birth date NOT NULL');
		$this->addColumn('Age varchar(40) NULL');
		$this->addColumn('home_language varchar(40) NULL');
		$this->addColumn('marital_status varchar(40) NOT NULL');
		$this->addColumn('contact_number varchar(10) NOT NULL');
		$this->addColumn('patient_email varchar(80) NULL');
		$this->addColumn('responsible_surname varchar(40) NOT NULL');
		$this->addColumn('responsible_firstName varchar(40) NOT NULL');
		$this->addColumn('responsible_IdNumber varchar(40) NOT NULL');
		$this->addColumn('home_address varchar(1024) NOT NULL');
		$this->addColumn('Employer varchar(40) NULL');
		$this->addColumn('work_contact_number varchar(40) NULL');
		$this->addColumn('medical_aid_scheme varchar(40) NULL');
		$this->addColumn('med_aid_number varchar(40) NULL');
		$this->addColumn('next_of_kin varchar(40) NULL');
		$this->addColumn('contact_no varchar(40) NULL');
		# End Added Data

		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		

		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		# Primary Keys
		$this->addPrimaryKey('id');
		# Unique Keys
		// $this->addUniqueKey('patient_email');
		// $this->addUniqueKey('identity_number');
		# Keys
		$this->addKey('Surname');
		$this->addKey('First_Name');
		$this->addKey('Clan_Name');
		$this->addKey('occupation');
		$this->addKey('date_of_birth');
		$this->addKey('Age');
		$this->addKey('home_language');
		$this->addKey('marital_status');
		$this->addKey('contact_number');
		$this->addKey('responsible_surname');
		$this->addKey('responsible_firstName');
		$this->addKey('responsible_IdNumber');
		$this->addKey('home_address');
		$this->addKey('Employer');
		$this->addKey('work_contact_number');
		$this->addKey('medical_aid_scheme');
		$this->addKey('med_aid_number');
		$this->addKey('next_of_kin');
		$this->addKey('contact_no');
		# Create Table
		$this->createTable('patients');
    }

    public function omega()
    {
        $this->dropTable('patients');
    }
}
