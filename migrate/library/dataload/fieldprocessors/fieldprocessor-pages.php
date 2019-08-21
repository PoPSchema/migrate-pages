<?php
namespace PoP\Pages;
use PoP\ComponentModel\Utils;

class FieldValueResolver_Pages extends \PoP\ComponentModel\FieldValueResolverBase
{
    public function getId($resultitem)
    {
        $cmspagesresolver = \PoP\Pages\ObjectPropertyResolverFactory::getInstance();
        $page = $resultitem;
        return $cmspagesresolver->getPageId($page);
    }

    public function getIdFieldDataloaderClass()
    {
        return \PoP\Pages\Dataloader_PageList::class;
    }
}

