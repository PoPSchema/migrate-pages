<?php
use PoP\Hooks\Facades\HooksAPIFacade;
use PoP\Routing\DefinitionGroups;
use PoP\Definitions\Facades\DefinitionManagerFacade;
$definitionManager = DefinitionManagerFacade::getInstance();

// Loader Pages
//--------------------------------------------------------
if (!defined('POP_PAGES_ROUTE_LOADERS_PAGES_FIELDS')) {
	define('POP_PAGES_ROUTE_LOADERS_PAGES_FIELDS', $definitionManager->getUniqueDefinition('loaders/pages/fields', DefinitionGroups::ROUTES));
}
if (!defined('POP_PAGES_ROUTE_LOADERS_PAGES_LAYOUTS')) {
	define('POP_PAGES_ROUTE_LOADERS_PAGES_LAYOUTS', $definitionManager->getUniqueDefinition('loaders/pages/layouts', DefinitionGroups::ROUTES));
}

HooksAPIFacade::getInstance()->addFilter(
    'routes',
    function($routes) {
    	return array_merge(
    		$routes,
    		[
				POP_PAGES_ROUTE_LOADERS_PAGES_FIELDS,
				POP_PAGES_ROUTE_LOADERS_PAGES_LAYOUTS,
    		]
    	);
    }
);