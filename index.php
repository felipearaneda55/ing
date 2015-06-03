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
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package local
 * @subpackage proyecto
 * @copyright 2015 Nicolás Díaz Francavila
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/buscador.php');
require_once ($CFG->dirroot . '/local/proyecto/tabla.php');

global $CFG, $OUTPUT, $DB;
require_login (); // login obligado
$url = new moodle_url ( '/local/proyecto/index.php' );
$context = context_system::instance (); // context_system::instance();
$PAGE->set_context ( $context );
$PAGE->set_url ( $url );
$PAGE->set_pagelayout ( 'standard' );

$title = 'busqueda de archivo';
$PAGE->set_title ( $title );
$PAGE->set_heading ( $title );

echo $OUTPUT->header ();
echo $OUTPUT->heading ( $title );

$formulario = new texbox (); // creacion de buscador

if ($formulario->is_cancelled ()) {
	echo 'Usted no ingreso busqueda';
} else if ($fromform = $formulario->get_data ()) {
	
	$where = "titulo like ?";
	$resultados = $DB->get_records_select ( 'local_proyecto_archivo', $where, array (
			"%" . $fromform->usuario . "%" 
	) );
	//var_dump ( $resultados )
	foreach ( $resultados as $resultado ) {
		
		echo $resultado->id . ' ' . $resultado->titulo;
	}
} else {
	$formulario->display ();
}

echo $OUTPUT->footer ();
