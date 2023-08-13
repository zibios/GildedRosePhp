<?php

namespace App\ItemStrategy;

use App\Item;

interface ItemStrategyInterface
{
    public const MAX_QUALITY = 50;
    public const MIN_QUALITY = 0;

    public function updateProperties(Item $item): void;
}
