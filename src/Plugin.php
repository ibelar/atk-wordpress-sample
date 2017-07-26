<?php
/**
 * Created by abelair.
 * Date: 2017-06-08
 * Time: 12:31 PM
 */

namespace atksample;


class Plugin extends \atkwp\AtkWp implements \atkwp\interfaces\Pluggable
{
	public $dbTables = [];

	public function init()
	{
		$this->setDbConnection();
		$this->setDbTables();
	}

	public function boot()
	{
		parent::boot();
	}



	public function activatePlugin()
	{
		$this->install();
	}

	public function deactivatePlugin()
	{
		// TODO: Implement deactivatePlugin() method.
	}

	public function uninstallPlugin()
	{
		// TODO: Implement uninstallPlugin() method.
	}

	public function setDbTables()
	{
		global $wpdb;
		$this->dbTables['event']  = $wpdb->prefix.__NAMESPACE__.'_event';
        $this->dbTables['country']  = $wpdb->prefix.__NAMESPACE__.'_event';
	}

	public function getDbTableName($table)
	{
		return $this->dbTables[$table];
	}

	protected function install()
	{
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta($this->getDbSchema());
	}

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