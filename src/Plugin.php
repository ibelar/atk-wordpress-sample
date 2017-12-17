<?php
/**
 * Sample plugin using Agile toolkit for Wordpress.
 *
 */

namespace atksample;

use atkwp\interfaces\PluginInterface;
use atkwp\AtkWp;

class Plugin extends AtkWp implements PluginInterface
{
    /**
     * Database table used by this plugin.
     *
     * @var array
     */
	public $dbTables = [];

    /**
     * Do initialisation work here.
     * This run prior to plugin boot() method.
     */
	public function init()
	{
	    //Set db connection to database.
		$this->setDbConnection();

		$this->setDbTables();
	}

	public function activatePlugin()
	{
	    // Install on plugin activation.
		$this->install();
	}

	public function deactivatePlugin()
	{
	}

    /**
     * Set database table name according to Wp installation and plugin namespace and store in array.
     * This way we do not need to bother knowing real table names set in Wp,
     * we simply need to call getDbTableName($table).
     */
	public function setDbTables()
	{
		global $wpdb;
		$this->dbTables['event']  = $wpdb->prefix.__NAMESPACE__.'_event';
	}

    /**
     * Return the table name as store in database.
     *
     * @param $table
     *
     * @return mixed
     */
	public function getDbTableName($table)
	{
		return $this->dbTables[$table];
	}

    /**
     * Plugin installation setup.
     */
	protected function install()
	{
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta($this->getDbSchema());
	}

    /**
     * Will create the table in database.
     *
     * @return string
     */
	private function getDbSchema()
	{
		$eventTable = $this->dbTables['event'];

		$sql = "\nCREATE TABLE `{$eventTable}` (
  				`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  				`name` VARCHAR(65) NOT NULL DEFAULT '',
  				`category` VARCHAR(65) NOT NULL DEFAULT '',
  				`description` VARCHAR(65) NOT NULL DEFAULT '',
  				`date` DATE NOT NULL,
  				PRIMARY KEY (`id`))
				ENGINE = InnoDB
				DEFAULT CHARACTER SET = utf8;";

		return $sql;
	}
}
