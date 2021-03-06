<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Rene <typo3@rs-softweb.de>
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Newestcontent_Domain_Model_Content.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Newest Content Elements
 *
 * @author Rene <typo3@rs-softweb.de>
 */
class Tx_Newestcontent_Domain_Model_ContentTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Newestcontent_Domain_Model_Content
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Newestcontent_Domain_Model_Content();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getNceShowasnewReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getNceShowasnew()
		);
	}

	/**
	 * @test
	 */
	public function setNceShowasnewForBooleanSetsNceShowasnew() { 
		$this->fixture->setNceShowasnew(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getNceShowasnew()
		);
	}
	
	/**
	 * @test
	 */
	public function getNceDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNceDescriptionForStringSetsNceDescription() { 
		$this->fixture->setNceDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getNceDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getNceStartReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setNceStartForDateTimeSetsNceStart() { }
	
	/**
	 * @test
	 */
	public function getNceUpdateReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setNceUpdateForDateTimeSetsNceUpdate() { }
	
	/**
	 * @test
	 */
	public function getNceStopReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setNceStopForDateTimeSetsNceStop() { }
	
}
?>