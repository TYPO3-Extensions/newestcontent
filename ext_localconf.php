<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Newestcontent',
	array(
		'Page' => 'list',
		'Content' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Page' => '',
		'Content' => '',
		
	)
);

?>