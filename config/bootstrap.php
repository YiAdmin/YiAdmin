<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

return [
    support\bootstrap\AppInit::class,
    support\bootstrap\Event::class,
    support\bootstrap\Session::class,
    support\bootstrap\LaravelDatabase::class,
    support\bootstrap\LaravelLog::class,
    support\bootstrap\Sync::class,
];
