<?php
use PoP\API\ModuleProcessors\AbstractRelationalFieldDataloadModuleProcessor;
use PoP\QueriedObject\ModuleProcessors\QueriedDBObjectModuleProcessorTrait;

class PoP_Pages_Module_Processor_FieldDataloads extends AbstractRelationalFieldDataloadModuleProcessor
{
    use QueriedDBObjectModuleProcessorTrait;

    public const MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS = 'dataload-dataquery-page-fields';

    public function getModulesToProcess(): array
    {
        return array(
            [self::class, self::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS],
        );
    }

    public function getDBObjectIDOrIDs(array $module, array &$props, &$data_properties)
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS:
                return $this->getSingleDBObjectID($module, $props, $data_properties);
        }
        
        return parent::getDBObjectIDOrIDs($module, $props, $data_properties);
    }

    public function getDataloaderClass(array $module): ?string
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS:
                return \PoP\Pages\Dataloader_PageList::class;
        }

        return parent::getDataloaderClass($module);
    }
}



