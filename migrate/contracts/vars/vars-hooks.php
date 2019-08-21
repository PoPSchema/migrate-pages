<?php
use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\Hooks\Facades\HooksAPIFacade;

HooksAPIFacade::getInstance()->addFilter(
    \PoP\ComponentModel\ModelInstance\ModelInstance::HOOK_COMPONENTS_RESULT, 
    function ($components) {

        $vars = \PoP\ComponentModel\Engine_Vars::getVars();
        switch ($vars['nature']) {
            case POP_NATURE_PAGE:
                $component_types = HooksAPIFacade::getInstance()->applyFilters(
                    '\PoP\Pages\ModelInstanceProcessor_Utils:components_from_vars:type:page',
                    []
                );
                if (in_array(POP_MODELINSTANCECOMPONENTTYPE_PAGE_PAGEID, $component_types)) {
                    $page_id = $vars['routing-state']['queried-object-id'];
                    $components[] = TranslationAPIFacade::getInstance()->__('page id:', 'pop-engine').$page_id;
                }
                break;
        }

        return $components;
    }
);