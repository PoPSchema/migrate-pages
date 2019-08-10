<?php
namespace PoP\Pages;
use PoP\Engine\Utils;

class FieldValueResolver_Pages extends \PoP\Engine\FieldValueResolverBase
{
    public function getValue($resultitem, string $fieldName, array $fieldAtts = [])
    {
        // First Check if there's a hook to implement this field
        $extensionValue = $this->getExtensionValue(self::class, $resultitem, $fieldName, $fieldAtts);
        if (!\PoP\Engine\GeneralUtils::isError($extensionValue)) {
            return $extensionValue;
        }

        $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();
        $page = $resultitem;
        switch ($fieldName) {

            case 'title':
                $value = $cmspagesapi->getTitle($this->getId($page));
                break;

            case 'content':
                $value = $cmspagesapi->getContent($this->getId($page));
                break;

            case 'url':
                $value = $cmspagesapi->getPageURL($this->getId($page));
                break;

            default:
                $value = parent::getValue($resultitem, $fieldName, $fieldAtts);
                break;
        }

        return $value;
    }

    public function getId($resultitem)
    {
        $cmspagesresolver = \PoP\Pages\ObjectPropertyResolverFactory::getInstance();
        $page = $resultitem;
        return $cmspagesresolver->getPageId($page);
    }

    public function getFieldDefaultDataloaderClass(string $fieldName, array $fieldAtts = [])
    {
        // First Check if there's a hook to implement this field
        $default_dataloader = $this->getExtensionFieldDefaultDataloaderClass(self::class, $fieldName, $fieldAtts);
        if ($default_dataloader) {
            return $default_dataloader;
        }

        switch ($fieldName) {
            case 'id':
                return \PoP\Pages\Dataloader_PageList::class;
        }

        return parent::getFieldDefaultDataloaderClass($fieldName, $fieldAtts);
    }
}

