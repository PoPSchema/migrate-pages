<?php
namespace PoP\Pages;

abstract class Dataloader_PageBase extends \PoP\ComponentModel\QueryDataDataloader
{
    public function getDataquery()
    {
        return GD_DATAQUERY_PAGE;
    }
    
    public function getDatabaseKey()
    {
        return GD_DATABASE_KEY_PAGES;
    }

    public function getFieldResolverClass(): string
    {
        return FieldResolver_Pages::class;
    }
    
    public function executeGetData(array $ids): array
    {
        if ($ids) {
            $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();
            $query = array(
                'include' => $ids,
            );
            return $cmspagesapi->getPages($query);
        }
        
        return array();
    }
}
