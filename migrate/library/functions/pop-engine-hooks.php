<?php
namespace PoP\Pages\WP;
use PoP\Hooks\Facades\HooksAPIFacade;

class Engine_Hooks
{
    public function __construct()
    {
        HooksAPIFacade::getInstance()->addAction(
            'augmentVarsProperties', 
            [$this, 'augmentVarsProperties'], 
            10,
            1
        );
    }

    public function augmentVarsProperties($vars_in_array)
    {
        // Set additional properties based on the nature: the global $post, $author, or $queried_object
        $vars = &$vars_in_array[0];
        $nature = $vars['nature'];
        $vars['routing-state']['is-page'] = $nature == POP_NATURE_PAGE;
    }
}

/**
 * Initialization
 */
new Engine_Hooks();
