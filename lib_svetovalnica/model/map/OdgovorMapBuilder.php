<?php


/**
 * This class adds structure of 'odgovor' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 07/09/09 16:39:56
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class OdgovorMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.OdgovorMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(OdgovorPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(OdgovorPeer::TABLE_NAME);
		$tMap->setPhpName('Odgovor');
		$tMap->setClassname('Odgovor');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('VPRASANJE_ID', 'VprasanjeId', 'INTEGER', 'vprasanje', 'ID', false, null);

		$tMap->addForeignKey('SVETOVALEC_ID', 'SvetovalecId', 'INTEGER', 'svetovalec', 'ID', false, null);

		$tMap->addColumn('NASLOV', 'Naslov', 'VARCHAR', false, 255);

		$tMap->addColumn('TEXT', 'Text', 'VARCHAR', false, 255);

	} // doBuild()

} // OdgovorMapBuilder
