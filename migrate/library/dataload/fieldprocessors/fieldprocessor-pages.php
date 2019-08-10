<?php
namespace PoP\Pages;
use PoP\Engine\Utils;

class FieldValueResolver_Pages extends \PoP\Engine\FieldValueResolverBase
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

