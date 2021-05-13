<?php

declare(strict_types=1);

namespace Beer_List\Dependencies\Faker\Core;

use Beer_List\Dependencies\Faker\Calculator;
use Beer_List\Dependencies\Faker\Extension;

/**
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class Barcode implements Extension\BarcodeExtension
{
    private function ean(int $length = 13): string
    {
        $code = Extension\Helper::numerify(str_repeat('#', $length - 1));

        return sprintf('%s%s', $code, Calculator\Ean::checksum($code));
    }

    public function ean13(): string
    {
        return $this->ean();
    }

    public function ean8(): string
    {
        return $this->ean(8);
    }

    public function isbn10(): string
    {
        $code = Extension\Helper::numerify(str_repeat('#', 9));

        return sprintf('%s%s', $code, Calculator\Isbn::checksum($code));
    }

    public function isbn13(): string
    {
        $code = '97' . mt_rand(8, 9) . Extension\Helper::numerify(str_repeat('#', 9));

        return sprintf('%s%s', $code, Calculator\Ean::checksum($code));
    }
}
