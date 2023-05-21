<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Config\Option;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Mail\Event;


class Error extends CBitrixComponent implements Controllerable
{
    public function executeComponent(): void
    {
        $this->IncludeComponentTemplate();
    }
    public function configureActions(): array
    {
        return [
            'sendMail' => [
                'prefilters' => []
            ],
        ];
    }

    public function sendMail(string $text): void
    {
        Event::send([
            'EVENT_NAME' => 'FEEDBACK_FORM',
            'LID' => SITE_ID,
            'C_FIELDS' => [
                'EMAIL_TO' => Option::get("main", "email"),
                'TEXT' => $text,
            ],
        ]);
    }
}
