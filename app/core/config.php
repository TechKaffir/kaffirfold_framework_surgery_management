<?php 
defined('ROOTPATH') OR exit('Access Denied!');


// DB Constants
if(empty($_SERVER['SERVER_NAME']) && php_sapi_name() == 'cli' || (!empty($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost'))
{
	/** database config **/
	define('DBNAME', 'kf_surgery_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', 'sql');
	
	define('ROOT', 'http://localhost/kaffirfold-surgery/public');

}else
{
	/** database config **/
	define('DBNAME', '');
	define('DBHOST', 'localhost');
	define('DBUSER', '');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'https://www.yourwebsite.com');

}


/* APP INFO */
define('APP_NAME', "KaffirFold Surgery Management System");
define('APP_NAME_SHORT', "KaffirFold SMS");
define('LOGO', "kf-sms-logo.png");
define('FAVICON', "kf-favicon.png");
define('LOGO_IMG_ALT', "KaffirFold Logo");
define('DEFAULT_TIMEZONE', "Africa/Johannesburg");

// Your company and post description
define('APP_DESC', "
With a user-friendly interface and intuitive design patterns, Kaffir Fold Framework takes you from the absolute beginning of your project to about 70% completion in no time. Our framework is not only easy to use but also highly customizable to fit the needs of your unique project.
");
define('CONTACT_NUMBER','27 65 858 5833');
define('EMAIL_ADDRESS','jongim@jongibrandz.co.za');
define('EST_YEAR','2023');
define('POLICY_ADOPT_DATE','2024-01-01');
define('DR_PR_NO','04265878');
define('MED_PR_NO','05362903');
define('DR_NAME','Dr. J.W. KaffirFold Incorporated');

define('DEF_CURR','R');
define('JONGI_CLI_VERS','1.0.0');

/* APP ADD ONS */
define('HERO_CTA','Contact Us');
define('HERO_CTA_LINK',ROOT . '/home/contact'); // redirect to the relevant page , eg 'home/blog'
define('NAV_LINK_NAME','Nav Link Name');

/* COMMAND LINE */
define('MPRETEXT','KaffirFold'); // The text at the beginning of the migration file name (e.g. {MPRETEXT}_th_Dec_2023_01_07_27_Persons.php)

/* APP COLORS */
define('THEME_COLOR','primary');  
define('VARIANT_COLOR','#5488ce'); 
# TEXT (Just change 'dark' or 'light')
define('FR_FOOTER_TEXT','text-dark');
define('FR_HERO_DESC_TEXT','text-dark');
define('FR_HERO_DESC_BG',VARIANT_COLOR);
# BG (Just change 'dark' or 'light')
define('BG','bg-light');




/** true means show errors **/
define('DEBUG', true);
