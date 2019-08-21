<?php
namespace PoP\Pages;

abstract class DataQuery_PostHookBase extends \PoP\ComponentModel\DataQuery_HookBase
{
    public function getDataqueryName()
    {
        return GD_DATAQUERY_PAGE;
    }
}
