<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 4/20/16
 * Time: 9:52 AM.
 */
if (!function_exists('adminuser')) {
    function adminuser($autoRenew = false)
    {
        return \common\Nexx::$app->user->getIdentity($autoRenew);
    }
}

if (!function_exists('flassSuccess')) {
    function flassSuccess($succ = false)
    {
        if ($succ) {
            return \common\Nexx::$app->session->setFlash('success', $succ);
        }

        return \common\Nexx::$app->session->setFlash('success', Yii::t('app', 'Your data is saved successfully.'));
    }
}

if (!function_exists('flassError')) {
    function flassError($err = false)
    {
        if ($err) {
            return \common\Nexx::$app->session->setFlash('error', $err);
        }

        return \common\Nexx::$app->session->setFlash('error', Yii::t('app', 'Cannot save your data.'));
    }
}

function fileuploaded()
{
}

//var_dump and die()
if (!function_exists('dd')) {
    function dd($var)
    {
        echo '<pre>';
        var_dump($var);
        die;
    }
}

if (!function_exists('pd')) {
    function pd($var)
    {
        echo '<pre>';
        print_r($var);
        die;
    }
}
