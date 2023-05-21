<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->IncludeComponent(
    'samson:addArticle',
    ''
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
