<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


/**
 * 
 *
 * @package    local
 * @subpackage proyecto
 * @copyright  2015 Nicolás Díaz Francavila
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

class tablas{
	
	public static function armartabla($archivos=null){
		global $DB, $OUTPUT;
		$tabla = new html_table();
		$tabla->head = array('Archivos');
		
		foreach ($archivos as $archivo){
			$tabla->data[] = array($archivo->name);
		
		}
		
		return $tabla;
		
	}
	

}