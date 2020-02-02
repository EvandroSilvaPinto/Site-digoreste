<?php

return [
    /*
    | -------------------------------------------------------------------------
    | SITEMAP ESTATIC
    | -------------------------------------------------------------------------
    |
    |   just pass the name of the static controller to be mounted url sitemap
    |
    |   EXAMPLE USAGE
    |   array(
    |       'controller_name',
    |   )
    */
    'static'       => array(
        'feed',
    ),

    /*
    | -------------------------------------------------------------------------
    | SITEMAP DINAMIC
    | -------------------------------------------------------------------------
    |
    |   just pass the array name of the model and the method of representing the
    |   data to build the url . the conversion of urls is made by the name of the
    |   model logo controler name must be identical to the name of the model
    |
    |
    |   EXAMPLE USAGE
    |   array(
    |       'model'    => 'model\name_model',
    |       'method'   => 'name_method',
    |       'nickname' => 'Name of the route'
    |   ),
    |   array(
    |       'model'    => 'name_model',
    |       'method'   => 'name_method',
    |       'nickname' => 'Name of the route'
    |   )
    |
    */
    'dinamic'      => array(
    )
];
