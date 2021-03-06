<?php
/**
 * LiteSpeed Cache for Prestashop.
 *
 * NOTICE OF LICENSE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see https://opensource.org/licenses/GPL-3.0 .
 *
 * @author   LiteSpeed Technologies
 * @copyright  Copyright (c) 2018 LiteSpeed Technologies, Inc. (https://www.litespeedtech.com)
 * @license     https://opensource.org/licenses/GPL-3.0
 */

use LiteSpeedCacheEsiModConf as EsiConf;

/* If you want to make "do not show again" be remembered, you need to completely disable
 * the guest mode in lscache configuration.
 */
class LscIqitPopup extends LscIntegration
{
    const NAME = 'iqitpopup';

    protected function init()
    {
        $confData = [
            EsiConf::FLD_PRIV => 1,
            EsiConf::FLD_TAG => 'popup',
            EsiConf::FLD_ASVAR => 1,
            EsiConf::FLD_ONLY_CACHE_EMPTY => 1,
            EsiConf::FLD_IGNORE_EMPTY => 0,
            EsiConf::FLD_RENDER_WIDGETS => '*',
        ];
        $this->esiConf = new EsiConf(self::NAME, EsiConf::TYPE_INTEGRATED, $confData);
        $this->registerEsiModule();
        LiteSpeedCacheConfig::getInstance()->overrideGuestMode();

        return true;
    }
}

LscIqitPopup::register();
