<?php
namespace PoP\Pages;
use PoP\ComponentModel\Utils;
use PoP\ComponentModel\TypeResolvers\AbstractTypeResolver;

class TypeResolver_Pages extends AbstractTypeResolver
{
    public const TYPE_COLLECTION_NAME = 'pages';

    public function getTypeCollectionName(): string
    {
        return self::TYPE_COLLECTION_NAME;
    }

    public function getId($resultItem)
    {
        $cmspagesresolver = \PoP\Pages\ObjectPropertyResolverFactory::getInstance();
        $page = $resultItem;
        return $cmspagesresolver->getPageId($page);
    }

    public function getIdFieldTypeDataResolverClass(): string
    {
        return \PoP\Pages\Dataloader_PageList::class;
    }
}

