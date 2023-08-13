<?php

namespace App\ItemStrategy\Strategy;

use App\Item;

final class AgedBrieItemStrategy extends AbstractItemStrategy
{
    public function updateProperties(Item $item): void
    {
        $this->decreaseSellIn($item);

        $this->increaseQuality($item);
        if ($this->isExpired($item)) {
            $this->increaseQuality($item);
        }
    }
}
