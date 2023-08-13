<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/task2/settings.php";

$response = [
    "success" => true,
    "data" => $_POST,
    "messages" => [],
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST[EMAIL_INPUT_NAME]) || empty($_POST[NAME_INPUT_NAME]) || empty($_POST[RATING_INPUT_NAME]) ||
        empty($_POST[COMMENT_INPUT_NAME])) {
        $response["success"] = false;
        $response["messages"][] = "Заполните все поля формы";
    }

    if (!filter_var($_POST[EMAIL_INPUT_NAME], FILTER_VALIDATE_EMAIL)) {
        $response["success"] = false;
        $response["messages"][] = sprintf(
            "E-mail адрес '%s' указан неверно", $_POST['email']
        );
    }

    if (strlen($_POST[NAME_INPUT_NAME]) > 20) {
        $response["success"] = false;
        $response["messages"][] = "Имя может содержать не более 20 символов";
    }

    if ($_POST[RATING_INPUT_NAME] < 0 || $_POST[RATING_INPUT_NAME] > 10) {
        $response["success"] = false;
        $response["messages"][] = "Оцените наш сайт по десятибальной шкале, спасибо!";
    }

    if (strlen($_POST[COMMENT_INPUT_NAME]) > 500) {
        $response["success"] = false;
        $response["messages"][] = "Комментарий может содержать не более 500 символов";
    }
}

if ($response["success"]) {
    $response["messages"][] = "Сообщение отправлено";
}

sendResponse($response);

function sendResponse($response)
{
    $logFileName = "/task2/logs/" . date('d.m.Y');
    $logData = array_merge(
        $response,
        [
            "time" => date('d.m.Y H:i:s'),
            "event" => "feedback form",
            "type" => $response["success"] ? "INFO" : "ERROR",
        ]
    );
    file_put_contents(
        $_SERVER["DOCUMENT_ROOT"] . $logFileName,
        print_r($logData, true),
        FILE_APPEND
    );

    unset($response["data"]);

    header('Content-type: application/json');
    die(json_encode($response));
}