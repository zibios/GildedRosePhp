<?php

namespace App\ItemStrategy;

use App\ItemStrategy\Strategy\AgedBrieItemStrategy;
use App\ItemStrategy\Strategy\BackstagePassItemStrategy;
use App\ItemStrategy\Strategy\StandardItemStrategy;
use App\ItemStrategy\Strategy\SulfurItemStrategy;

final class ItemStrategyFactory
{
    private const AGED_BRIE = 'Aged Brie';
    private const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';
    private const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';

    public static function build(string $itemName): ItemStrategyInterface
    {
        return match ($itemName) {
            self::AGED_BRIE => new AgedBrieItemStrategy(),
            self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT => new BackstagePassItemStrategy(),
            self::SULFURAS_HAND_OF_RAGNAROS => new SulfurItemStrategy(),
            default => new StandardItemStrategy(),
        };
    }
}
