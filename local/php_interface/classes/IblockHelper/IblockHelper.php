<?php

declare(strict_types=1);

namespace samson\IblockHelper;

use Bitrix\Iblock\IblockTable;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;


Loader::includeModule("iblock");


class IblockHelper
{
    public static function getIblockIdByCode($iblockCode): mixed
    {
        $result = IblockTable::getList([
            'filter' => [
                '=CODE' => $iblockCode,
            ],
            'select' => ['ID'],
        ])->fetch();

        if ($result) {
            return $result['ID'];
        }

        return false;
    }
}
