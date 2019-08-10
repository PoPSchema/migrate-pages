<?php
namespace PoP\Pages;

class FieldValueResolver_Pages_Hook extends \PoP\Engine\AbstractDBDataFieldValueResolverExtension
{
    public static function getClassesToAttachTo()
    {
        return array(\PoP\Pages\FieldValueResolver_Pages::class);
    }

    public function getValue($fieldValueResolver, $resultitem, string $fieldName, array $fieldAtts = [])
    {
        $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();
        $page = $resultitem;
        switch ($fieldName) {

            case 'title':
                return $cmspagesapi->getTitle($fieldValueResolver->getId($page));

            case 'content':
                return $cmspagesapi->getContent($fieldValueResolver->getId($page));

            case 'url':
                return $cmspagesapi->getPageURL($fieldValueResolver->getId($page));
        }

        return parent::getValue($fieldValueResolver, $resultitem, $fieldName, $fieldAtts);
    }
}

// Static Initialization: Attach
FieldValueResolver_Pages_Hook::attach();
