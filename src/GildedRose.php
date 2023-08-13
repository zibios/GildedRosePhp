<?php

namespace App;

use App\ItemStrategy\ItemStrategyFactory;

final class GildedRose
{
    public function updateQuality(Item $item): void
    {
        $strategy = ItemStrategyFactory::build($item->name);
        $strategy->updateProperties($item);
    }
}
