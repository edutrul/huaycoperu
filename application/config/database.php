<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Sample database configuration file for Ushahidi.
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - https://github.com/ushahidi/Ushahidi_Web
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */

$config['default'] = array(
	'benchmark' => TRUE,
	'persistent' => FALSE,
	'connection' => array(
		'type' => 'mysqli',
		'user' => 'huaycoperu',
		'pass' => 'huaycoperu123',
		'host' => 'marcas.ch9ullzgrubf.us-east-1.rds.amazonaws.com',
		'port' => FALSE,
		'socket' => FALSE,
		'database' => 'db_local_huaycoperu',
	),
	'character_set' => 'utf8',
	'table_prefix' => '',
	'object' => TRUE,
	'cache' => FALSE,
	'escape' => TRUE
);
