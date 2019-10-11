<?php
namespace PoP\Pages;
use PoP\ComponentModel\Utils;
use PoP\ComponentModel\FieldResolvers\AbstractFieldResolver;

class FieldResolver_Pages extends AbstractFieldResolver
{
    public function getId($resultItem)
    {
        $cmspagesresolver = \PoP\Pages\ObjectPropertyResolverFactory::getInstance();
        $page = $resultItem;
        return $cmspagesresolver->getPageId($page);
    }

    public function getIdFieldDataloaderClass()
    {
        return \PoP\Pages\Dataloader_PageList::class;
    }
}

