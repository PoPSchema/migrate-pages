<?php
namespace PoPSchema\Pages;
use PoP\LooseContracts\AbstractLooseContractSet;

class CMSLooseContracts extends AbstractLooseContractSet
{
	public function getRequiredHooks() {
		return [
			// Filters
			'popcms:page:title',
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
new CMSLooseContracts(\PoP\LooseContracts\Facades\LooseContractManagerFacade::getInstance());

