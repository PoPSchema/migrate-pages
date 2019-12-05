<?php
namespace PoP\Pages;

abstract class Dataloader_PageBase extends \PoP\ComponentModel\Dataloader
{
    public function getDataquery()
    {
        return GD_DATAQUERY_PAGE;
    }
    
    public function getDatabaseKey()
    {
        return GD_DATABASE_KEY_PAGES;
    }

    public function getTypeResolverClass(): string
    {
        return TypeResolver_Pages::class;
    }
    
    public function resolveObjectsFromIDs(array $ids): array
    {
        $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();
        $query = array(
            'include' => $ids,
        );
        return $cmspagesapi->getPages($query);
    }
}
