<?php
namespace PoP\Pages;

trait SettingsProcessor_Trait
{
    public function routesToProcess()
    {
        return array_filter(
            array(
                POP_PAGES_ROUTE_LOADERS_PAGES_FIELDS,
                POP_PAGES_ROUTE_LOADERS_PAGES_LAYOUTS,
            )
        );
    }
}
