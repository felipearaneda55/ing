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
 * @copyright 2015 Nicol�s D�az Francavila
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once (dirname ( __FILE__ ) . '/../../config.php'); // obligatorio
require_once ($CFG->dirroot . '/local/proyecto/buscador.php');
require_once($CFG->dirroot.'/local/proyecto/tabla.php');

global $CFG, $OUTPUT, $DB;
require_login (); //login obligado
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


$buscador = new texbox ( null ); // creacion de buscador
$buscador->display ();

$resultado= $buscador->get_data();

if ($resultado==null) {
echo "No se ha ingresado busqueda";
}

else {
	$archivo= $resultado->archivo;
	
	$busqueda= $DB->get_record_sql("SELECT FROM {local_proyecto_archivo} WHERE
			    Titulo='$resultado' OR link_archivo='$resultado' OR id='$resultado'");
	
	if ($resultado==null ||$resultado==' ')
		echo "No se poseen archivos";
	
	else{
		echo "Archivo: ". $archivo.'<br/>';
		$tabla= tablas::armartabla($busqueda);
		echo html_writer::table($tabla);
	}
	
	}
	
	echo $OUTPUT->footer ();
