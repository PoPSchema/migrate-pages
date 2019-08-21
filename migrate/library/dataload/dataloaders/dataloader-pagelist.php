<?php
namespace PoP\Pages;
use PoP\Hooks\Facades\HooksAPIFacade;

class Dataloader_PageList extends Dataloader_PageBase
{
    use \PoP\ComponentModel\Dataloader_ListTrait;

    /**
     * Function to override
     */
    public function getDataFromIdsQuery(array $ids): array
    {
        $query = array();
        $query['include'] = $ids;
        $query['page-status'] = [
            POP_PAGESTATUS_PUBLISHED, 
            POP_PAGESTATUS_DRAFT, 
            POP_PAGESTATUS_PENDING,
        ]; // Status can also be 'pending', so don't limit it here, just select by ID
        return $query;
    }
    
    public function executeQuery($query, array $options = [])
    {
        $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();
        return $cmspagesapi->getPages($query, $options);
    }

    protected function getOrderbyDefault()
    {
        return \PoP\LooseContracts\NameResolverFactory::getInstance()->getName('popcms:dbcolumn:orderby:pages:date');
    }

    protected function getOrderDefault()
    {
        return 'DESC';
    }
    
    public function executeQueryIds($query)
    {
        $options = [
            'return-type' => POP_RETURNTYPE_IDS,
        ];
        return $this->executeQuery($query, $options);
    }

    protected function getLimitParam($query_args)
    {
        return HooksAPIFacade::getInstance()->applyFilters(
            'Dataloader_PageList:query:limit',
            $this->getMetaLimitParam($query_args)
        );
    }

    protected function getQueryHookName() 
    {
        return 'Dataloader_PageList:query';
    }
}
