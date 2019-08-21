<?php

class PoP_Pages_Module_Processor_FieldDataloads extends \PoP\ComponentModel\PoP_Module_Processor_RelationalFieldDataloadsBase
{
    public const MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS = 'dataload-dataquery-page-fields';

    public function getModulesToProcess()
    {
        return array(
            [self::class, self::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS],
        );
    }

    public function getDataloaderClass(array $module)
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_DATAQUERY_PAGE_FIELDS:
                return \PoP\Pages\Dataloader_Page::class;
        }

        return parent::getDataloaderClass($module);
    }
}



