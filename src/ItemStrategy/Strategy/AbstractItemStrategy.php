<?php

namespace App\ItemStrategy\Strategy;

use App\Item;
use App\ItemStrategy\ItemStrategyInterface;

abstract class AbstractItemStrategy implements ItemStrategyInterface
{
    protected function decreaseSellIn(Item $item): void
    {
        --$item->sellIn;
    }

    protected function increaseQuality(Item $item): void
    {
        ++$item->quality;
        if ($item->quality > self::MAX_QUALITY) {
            $item->quality = self::MAX_QUALITY;
        }
    }

    protected function decreaseQuality(Item $item): void
    {
        --$item->quality;
        if ($item->quality < self::MIN_QUALITY) {
            $item->quality = self::MIN_QUALITY;
        }
    }

    protected function isExpired(Item $item): bool
    {
        return $item->sellIn < 0;
    }
}
