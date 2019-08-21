<?php
namespace PoP\Pages;

define('GD_DATAQUERY_PAGE', 'post');

class DataQuery_Page extends \PoP\ComponentModel\DataQueryBase
{
    public function getName()
    {
        return GD_DATAQUERY_PAGE;
    }

    public function getNonCacheableRoute()
    {
        return POP_PAGES_ROUTE_LOADERS_PAGES_FIELDS;
    }
    public function getCacheableRoute()
    {
        return POP_PAGES_ROUTE_LOADERS_PAGES_LAYOUTS;
    }
    public function getObjectidFieldname()
    {
        return POP_INPUTNAME_PAGEID;
    }
}
    
/**
 * Initialize
 */
new DataQuery_Page();
