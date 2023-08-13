<?php

namespace App;

final class Item
{
    public function __construct(
        public string $name,
        public int $sellIn,
        public int $quality
    ) {
    }
}
