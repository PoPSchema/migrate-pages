<?php
use PoP\Hooks\Facades\HooksAPIFacade;
use PoP\ComponentModel\Schema\FieldQueryInterpreter;

class PoP_Pages_Module_EntryRouteModuleProcessor extends \PoP\ModuleRouting\AbstractEntryRouteModuleProcessor
{
    private static $restFieldsQuery;
    private static $restFields;
    public static function getRESTFields(): array
    {
        if (is_null(self::$restFields)) {
            self::$restFields = self::getRESTFieldsQuery();
            if (is_string(self::$restFields)) {
                self::$restFields = FieldQueryInterpreter::convertAPIQueryFromStringToArray(self::$restFields);
            }
        }
        return self::$restFields;
    }
    public static function getRESTFieldsQuery(): string
    {
        if (is_null(self::$restFieldsQuery)) {
            $restFieldsQuery = 'id|title|url|content';
            self::$restFieldsQuery = (string) HooksAPIFacade::getInstance()->applyFilters(
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
        if (!\PoP\ComponentModel\Server\Utils::disableAPI()) {
            $vars = \PoP\ComponentModel\Engine_Vars::getVars();

            // Page
            $ret[POP_NATURE_PAGE][] = [
                'module' => [PoP_Pages_Module_Processor_FieldDataloads::class, PoP_Pages_Module_Processor_FieldDataloads::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS],
                'conditions' => [
                    'scheme' => POP_SCHEME_API,
                ],
            ];
            // REST API Page
            $ret[POP_NATURE_PAGE][] = [
                'module' => [PoP_Pages_Module_Processor_FieldDataloads::class, PoP_Pages_Module_Processor_FieldDataloads::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS, ['fields' => isset($vars['fields']) ? $vars['fields'] : self::getRESTFields()]],
                'conditions' => [
                    'scheme' => POP_SCHEME_API,
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
