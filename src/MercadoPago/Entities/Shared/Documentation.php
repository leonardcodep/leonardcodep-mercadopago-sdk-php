<?php
/**
 * Documentation class file
 */
namespace MercadoPago\Entity\Shared;

use MercadoPago\Annotation\Attribute;
use MercadoPago\Annotation\DenyDynamicAttribute;
use MercadoPago\Entity;

/**
 * Documentation class
 */
class Documentation extends Entity
{
    /**
     * type
     * @Attribute(type = "string", readOnly = true)
     * @var string
    */
    protected $type;

    /**
     * url
     * @Attribute(type = "string", readOnly = true)
     * @var string
    */
    protected $url;

    /**
     * description
    * @Attribute(type = "string", readOnly = true)
     * @var string
    */
    protected $description;
}
