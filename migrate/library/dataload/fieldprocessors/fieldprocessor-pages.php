<?php
namespace PoP\Pages;
use PoP\ComponentModel\Utils;
use PoP\ComponentModel\TypeResolvers\AbstractTypeResolver;

class TypeResolver_Pages extends AbstractTypeResolver
{
    public function getId($resultItem)
    {
        $cmspagesresolver = \PoP\Pages\ObjectPropertyResolverFactory::getInstance();
        $page = $resultItem;
        return $cmspagesresolver->getPageId($page);
    }

    public function getIdFieldTypeDataResolverClass()
    {
        return \PoP\Pages\Dataloader_PageList::class;
    }
}

