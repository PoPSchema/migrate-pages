<?php
namespace PoP\Pages;

class CMSLooseContracts extends \PoP\LooseContracts\AbstractCMSLooseContracts
{
	public function getRequiredHooks() {
		return [
			// Filters
			'popcms:page:title',
			'popcms:page:content',
		];
	}

	public function getRequiredNames() {
		return [
			// DB Columns
			'popcms:dbcolumn:orderby:pages:date',
		];
	}
}

/**
 * Initialize
 */
new CMSLooseContracts();

