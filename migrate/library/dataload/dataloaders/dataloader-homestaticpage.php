<?php
namespace PoP\Pages;

class Dataloader_HomeStaticPage extends Dataloader_PageBase
{
    public function getDbobjectIds($data_properties)
    {
        $cmspagesapi = \PoP\Pages\FunctionAPIFactory::getInstance();
        if ($page_id = $cmspagesapi->getHomeStaticPage()) {
            return array($page_id);
        }
        return array();
    }
}
    

