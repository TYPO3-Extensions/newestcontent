<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Rene <typo3@rs-softweb.de>
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 * @package newestcontent
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * $Id$
 * $Rev$
 * $Author$
 * $Date$
 *
 */
class Tx_Newestcontent_Domain_Repository_ContentRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * @var Tx_Extbase_Persistence_QueryInterface
	 */
	protected $query = NULL;

	/**
	 * Query contraints to use
	 * @var array
	 */
	protected $queryConstraints = array();

	/**
	 * Selected page UIDs
	 * @var array
	 */
	protected $selectedPageUids = array();

	/**
	 * Initializes the repository.
	 *
	 * @return void
	 *
	 * @see Tx_Extbase_Persistence_Repository::initializeObject()
	 */
	public function initializeObject() {
		$querySettings = $this->objectManager->create('Tx_Extbase_Persistence_Typo3QuerySettings');
		$querySettings->setRespectStoragePage(FALSE);
		$this->setDefaultQuerySettings($querySettings);
		$this->query = $this->createQuery();
	}

	/**
	 * Setup the default contraints for the query.
	 * @return void
	 */
	public function setDefaultQueryContraints() {
		$this->addQueryConstraint($this->query->equals('nceShowasnew', TRUE));
//		$this->addQueryConstraint($this->query->in('ctype', array('text','textimage')));
	}
	
	/**
	 * Set the UIDs of selected pages for further use
	 * @param array|Tx_Extbase_Persistence_QueryResultInterface $queryResult Result of the Query as array
	 * @return void
	 */
	private function setSelectedPageUids($queryResult){
		$this->selectedPageUids = array();
		foreach($queryResult as $content){
			$this->selectedPageUids[] = $content->getPid();
		}
	}
	
	/**
	 * Return the UIDs of selected pages for further use
	 * @return array
	 */
	public function getSelectedPageUids() {
		return $this->selectedPageUids;
	}

	/**
	 * Select the given PIDs.
	 * @param string $pidList Comma separated list of PIDs
	 * @return void
	 */
	public function selectByPagesList($pidList) {
		$this->addQueryConstraint($this->query->in('pid', $pidList));
	}

	/**
	 * Adds query constraint to array
	 * @param Tx_Extbase_Persistence_QOM_ConstraintInterface $constraint Constraint to add
	 * @return void
	 */
	private function addQueryConstraint(Tx_Extbase_Persistence_QOM_ConstraintInterface $constraint) {
		$this->queryConstraints[] = $constraint;
	}

	/**
	 * Create the query constraints and then execute the query
	 * @return array|Tx_Extbase_Persistence_QueryResultInterface Result of query
	 */
	public function executeQuery() {
		$query = $this->query;
		$query->matching($query->logicalAnd($this->queryConstraints));
		$queryResult = $query->execute()->toArray();
		$this->setSelectedPageUids($queryResult);
		$this->resetQuery();
		return $queryResult;
	}

	/**
	 * Resets query and query constraints after execution
	 * @return void
	 */
	private function resetQuery() {
		unset($this->query);
		$this->query = $this->createQuery();
		unset($this->queryConstraints);
		$this->queryConstraints = array();
	}


}
?>