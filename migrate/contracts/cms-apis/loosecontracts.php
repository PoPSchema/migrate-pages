<?php
namespace PoP\Pages;
use PoP\LooseContracts\Contracts\AbstractLooseContractSet;

class CMSLooseContracts extends AbstractLooseContractSet
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

