<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @package Piwik
 */

use Piwik\Error;
use Piwik\ExceptionHandler;
use Piwik\FrontController;

if (!defined('PIWIK_ENABLE_ERROR_HANDLER') || PIWIK_ENABLE_ERROR_HANDLER) {
    require_once PIWIK_INCLUDE_PATH . '/core/Error.php';
    Error::setErrorHandler();
    require_once PIWIK_INCLUDE_PATH . '/core/ExceptionHandler.php';
    ExceptionHandler::setUp();
}

FrontController::setUpSafeMode();

if (!defined('PIWIK_ENABLE_DISPATCH') || PIWIK_ENABLE_DISPATCH) {
    $controller = FrontController::getInstance();
    $controller->init();
    $response = $controller->dispatch();

    if (!is_null($response)) {
        echo $response;
    }
}
