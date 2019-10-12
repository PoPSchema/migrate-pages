<?php
use PoP\ComponentModel\ModuleProcessors\AbstractRelationalFieldDataloadModuleProcessor;

class PoP_Pages_Module_Processor_FieldDataloads extends AbstractRelationalFieldDataloadModuleProcessor
{
    public const MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS = 'dataload-dataquery-page-fields';

    public function getModulesToProcess(): array
    {
        return array(
            [self::class, self::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS],
        );
    }

    public function getDataloaderClass(array $module): ?string
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS:
                return \PoP\Pages\Dataloader_Page::class;
        }

        return parent::getDataloaderClass($module);
    }
}



