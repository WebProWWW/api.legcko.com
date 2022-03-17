<?php
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Email Body Parser
 */
class EmailParserController extends Controller
{
    /**
     * Parse New Mail Body And Send To CRM
     */
    public function actionSendToCrm()
    {
        return ExitCode::OK;
    }
}
