<?php
use PoP\Hooks\Facades\HooksAPIFacade;

// Loader Pages
//--------------------------------------------------------
if (!defined('POP_PAGES_ROUTE_LOADERS_PAGES_FIELDS')) {
	define('POP_PAGES_ROUTE_LOADERS_PAGES_FIELDS', \PoP\Definitions\DefinitionUtils::getUniqueDefinition('loaders/pages/fields', POP_DEFINITIONGROUP_ROUTES));
}
if (!defined('POP_PAGES_ROUTE_LOADERS_PAGES_LAYOUTS')) {
	define('POP_PAGES_ROUTE_LOADERS_PAGES_LAYOUTS', \PoP\Definitions\DefinitionUtils::getUniqueDefinition('loaders/pages/layouts', POP_DEFINITIONGROUP_ROUTES));
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