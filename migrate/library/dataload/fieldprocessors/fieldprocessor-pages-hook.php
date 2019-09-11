<?php
namespace PoP\Pages;
use PoP\Translation\Facades\TranslationAPIFacade;

class FieldValueResolver_Pages_Unit extends \PoP\ComponentModel\AbstractDBDataFieldValueResolverUnit
{
    public static function getClassesToAttachTo()
    {
        return array(\PoP\Pages\FieldValueResolver_Pages::class);
    }

    public function getFieldNamesToResolve(): array
    {
        return [
			'title',
            'content',
            'url',
        ];
    }

    public function getFieldDocumentationType(string $fieldName): ?string
    {
        $types = [
			'title' => TYPE_STRING,
            'content' => TYPE_STRING,
            'url' => TYPE_URL,
        ];
        return $types[$fieldName];
    }

    public function getFieldDocumentationDescription(string $fieldName): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        $descriptions = [
			'title' => $translationAPI->__('Page\'s title', 'pop-pages'),
            'content' => $translationAPI->__('Page\'s content', 'pop-pages'),
            'url' => $translationAPI->__('Page\'s URL', 'pop-pages'),
        ];
        return $descriptions[$fieldName];
    }

    public function getValue($fieldValueResolver, $resultitem, string $fieldName, array $fieldArgs = [])
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

        return parent::getValue($fieldValueResolver, $resultitem, $fieldName, $fieldArgs);
    }
}

// Static Initialization: Attach
FieldValueResolver_Pages_Unit::attach();
