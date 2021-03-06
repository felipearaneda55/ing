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
//a

/**
 *
 * @package    local
 * @subpackage proyecto
 * @copyright  2015 Nicolás Díaz Francavila
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(dirname(__FILE__) . '/../../config.php');
require_once($CFG->libdir.'/formslib.php');

class textbox extends moodleform {

	public function definition() {
		global $CFG;

		$mform = $this->_form ;
		$mform->addElement('text', 'archivo', 'Buscar Archivo:');
		$mform->setType('archivo', PARAM_TEXT);
		$mform->addRule('archivo','Buscar Archivo:','required');
		$mform->setDefault('archivo', '');


		$this->add_action_buttons(true,'buscar');

	}
}

?>
