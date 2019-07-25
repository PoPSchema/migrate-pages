<?php
use PoP\Hooks\Facades\HooksAPIFacade;

class PoP_Pages_Module_EntryRouteModuleProcessor extends \PoP\ModuleRouting\AbstractEntryRouteModuleProcessor
{
    private static $restFieldsQuery;
    private static $restFields;
    public static function getRESTFields() {
        if (is_null(self::$restFields)) {
            self::$restFields = \PoP\Engine\Utils::maybeConvertDotNotationToArray(
                self::getRESTFieldsQuery()
            );
        }
        return self::$restFields;
    }
    public static function getRESTFieldsQuery() {
        if (is_null(self::$restFieldsQuery)) {
            $restFieldsQuery = 'id|title|date|url';
            self::$restFieldsQuery = HooksAPIFacade::getInstance()->applyFilters(
                'Pages:RESTFields',
                $restFieldsQuery
            );
        }
        return self::$restFieldsQuery;
    }

    public function getModulesVarsPropertiesByNature()
    {
        $ret = array();

        // API
        if (\PoP\Engine\Server\Utils::enableApi()) {
            $vars = \PoP\Engine\Engine_Vars::getVars();
            
            // Page
            $ret[POP_NATURE_PAGE][] = [
                'module' => [PoP_Pages_Module_Processor_FieldDataloads::class, PoP_Pages_Module_Processor_FieldDataloads::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS],
                'conditions' => [
                    'action' => POP_ACTION_API,
                ],
            ];
            // REST API Page
            $ret[POP_NATURE_PAGE][] = [
                'module' => [PoP_Pages_Module_Processor_FieldDataloads::class, PoP_Pages_Module_Processor_FieldDataloads::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS, ['fields' => isset($vars['fields']) ? $vars['fields'] : self::getRESTFields()]],
                'conditions' => [
                    'action' => POP_ACTION_API,
                    'datastructure' => GD_DATALOAD_DATASTRUCTURE_REST,
                ],
            ];
        }

        return $ret;
    }
}

/**
 * Initialization
 */
new PoP_Pages_Module_EntryRouteModuleProcessor();
