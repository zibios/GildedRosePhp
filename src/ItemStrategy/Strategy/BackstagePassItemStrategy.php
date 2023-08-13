<?php

namespace App\ItemStrategy\Strategy;

use App\Item;

final class BackstagePassItemStrategy extends AbstractItemStrategy
{
    private const DOUBLE_QUALITY_THRESHOLD = 10;
    private const TRIPLE_QUALITY_THRESHOLD = 5;

    public function updateProperties(Item $item): void
    {
        $this->increaseQuality($item);
        if ($this->isExpirationTimeBelowThreshold($item, self::DOUBLE_QUALITY_THRESHOLD)) {
            $this->increaseQuality($item);
        }
        if ($this->isExpirationTimeBelowThreshold($item, self::TRIPLE_QUALITY_THRESHOLD)) {
            $this->increaseQuality($item);
        }

        $this->decreaseSellIn($item);
        if ($this->isExpired($item)) {
            $this->setAsWorthless($item);
        }
    }

    private function setAsWorthless(Item $item): void
    {
        $item->quality = self::MIN_QUALITY;
    }

    private function isExpirationTimeBelowThreshold(Item $item, int $timeThreshold): bool
    {
        return $item->sellIn <= $timeThreshold;
    }
}
