<?php

namespace Waredesk\Collections\Products\Variants;

use Waredesk\Collection;
use Waredesk\Models\Product\Variant\Annotation;

/**
 * @method Annotation first()
 * @method Annotation current()
 * @method Annotation next()
 */
class Annotations extends Collection
{
    /**
     * @param Annotation $item
     */
    public function add($item): void
    {
        parent::add($item);
    }
}
