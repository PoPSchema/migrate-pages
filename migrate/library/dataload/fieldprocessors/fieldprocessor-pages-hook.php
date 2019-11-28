<?php
namespace PoP\Pages;
use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\ComponentModel\Schema\SchemaDefinition;
use PoP\ComponentModel\FieldValueResolvers\AbstractDBDataFieldValueResolver;
use PoP\ComponentModel\FieldResolvers\FieldResolverInterface;

class FieldValueResolver_Pages extends AbstractDBDataFieldValueResolver
{
    public static function getClassesToAttachTo(): array
    {
        return array(\PoP\Pages\FieldResolver_Pages::class);
    }

    public static function getFieldNamesToResolve(): array
    {
        return [
			'title',
            'content',
            'url',
        ];
    }

    public function getSchemaFieldType(FieldResolverInterface $fieldResolver, string $fieldName): ?string
    {
        $types = [
			'title' => SchemaDefinition::TYPE_STRING,
            'content' => SchemaDefinition::TYPE_STRING,
            'url' => SchemaDefinition::TYPE_URL,
        ];
        return $types[$fieldName] ?? parent::getSchemaFieldType($fieldResolver, $fieldName);
    }

    public function getSchemaFieldDescription(FieldResolverInterface $fieldResolver, string $fieldName): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        $descriptions = [
			'title' => $translationAPI->__('Page\'s title', 'pop-pages'),
            'content' => $translationAPI->__('Page\'s content', 'pop-pages'),
            'url' => $translationAPI->__('Page\'s URL', 'pop-pages'),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($fieldResolver, $fieldName);
    }

    public function resolveValue(FieldResolverInterface $fieldResolver, $resultItem, string $fieldName, array $fieldArgs = [], ?array $variables = null, ?array $expressions = null, array $options = [])
    {
        $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();
        $page = $resultItem;
        switch ($fieldName) {
            case 'title':
                return $cmspagesapi->getTitle($fieldResolver->getId($page));

            case 'content':
                return $cmspagesapi->getContent($fieldResolver->getId($page));

            case 'url':
                return $cmspagesapi->getPageURL($fieldResolver->getId($page));
        }

        return parent::resolveValue($fieldResolver, $resultItem, $fieldName, $fieldArgs, $variables, $expressions, $options);
    }
}

// Static Initialization: Attach
FieldValueResolver_Pages::attach(\PoP\ComponentModel\AttachableExtensions\AttachableExtensionGroups::FIELDVALUERESOLVERS);
