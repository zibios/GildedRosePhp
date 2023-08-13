<?php

namespace App\ItemStrategy\Strategy;

use App\Item;

final class StandardItemStrategy extends AbstractItemStrategy
{
    public function updateProperties(Item $item): void
    {
        $this->decreaseSellIn($item);

        $this->decreaseQuality($item);
        if ($this->isExpired($item)) {
            $this->decreaseQuality($item);
        }
    }
}
