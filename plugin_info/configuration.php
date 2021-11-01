<?php
/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

require_once dirname(__FILE__) . '/../../../core/php/core.inc.php';
include_file('core', 'authentification', 'php');
if (!isConnect()) {
    include_file('desktop', '404', 'php');
    die();
}
?>
<form class="form-horizontal">
    <fieldset>
        <legend><i class="icon loisir-darth"></i> {{Démon}}</legend>
        <div class="form-group">
            <label class="col-lg-4 control-label">{{Interface réseau (modification dangereuse)}}</label>
            <div class="col-lg-2">
                <select class="configKey form-control" data-l1key="interface">
                    <option value="">{{Défaut}}</option>
                    <?php
                        $interfacesinfo = network::getInterfacesInfo();
                        foreach ($interfacesinfo as $interfaceinfo) {
                        $interface = $interfaceinfo["ifname"];
                        $baseInterface = substr($interface, 0, strrpos($interface, '@'));
                            if ($baseInterface && $baseInterface != $interface)
                                echo '<option value="' . $baseInterface . '">' . $baseInterface . '</option>';
                            echo '<option value="' . $interface . '">' . $interface . '</option>';
                    ?>
                </select>
            </div>
        </div>
    </fieldset>
</form>
