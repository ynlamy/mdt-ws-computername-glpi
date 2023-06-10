<?php

/**
 * ---------------------------------------------------------------------
 *
 * ws_computername.php
 *
 * @copyright 2023 Yoann LAMY
 * @licence   https://www.gnu.org/licenses/gpl-3.0.html 
 * @link      https://github.com/ynlamy/mdt-ws-computername-glpi
 *
 * ---------------------------------------------------------------------
 *
 * LICENSE
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
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * ---------------------------------------------------------------------
 */
 
define('GLPI_ROOT', './glpi');
include(GLPI_ROOT . '/inc/includes.php');

if (isset($_GET["SerialNumber"])) {
    
    $serial_number = urldecode($_GET['SerialNumber']);
    
    $iterator = $DB->request([
        'SELECT' => 'name',
        'FROM'   => 'glpi_computers',
        'WHERE'  => [
            'serial' => $serial_number
        ],
        'LIMIT'  => 1
    ]);

    if (count($iterator)) {
        $name = $iterator->current()['name'];
    }
    else {
        $name = "";
    }
    
    header('Content-type: text/xml');
    echo "<computer>";
    echo "<name>$name</name>";
    echo "</computer>";

}

?>