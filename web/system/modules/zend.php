<?
/**
 * Scavix Web Development Framework
 *
 * Copyright (c) 2007-2012 PamConsult GmbH
 * Copyright (c) since 2013 Scavix Software Ltd. & Co. KG
 *
 * This library is free software; you can redistribute it
 * and/or modify it under the terms of the GNU Lesser General
 * Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any
 * later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library. If not, see <http://www.gnu.org/licenses/>
 *
 * @author PamConsult GmbH http://www.pamconsult.com <info@pamconsult.com>
 * @copyright 2007-2012 PamConsult GmbH
 * @author Scavix Software Ltd. & Co. KG http://www.scavix.com <info@scavix.com>
 * @copyright since 2012 Scavix Software Ltd. & Co. KG
 * @license http://www.opensource.org/licenses/lgpl-license.php LGPL
 */

/**
 * Initializes the zend module
 * 
 * This module provides access to the Zend framework from within the WDF.
 * Note: We do not deliver a copy of the Zend Framework. Please set the path there manually: <cfg_set>('zend','include_path','/path/to/zend/fw')
 * @return void
 */
function zend_init()
{
	global $CONFIG;

	if( !isset($CONFIG['zend']['include_path']) )
		$CONFIG['zend']['include_path'] = __DIR__."/zend";

	$inc_path = ini_get("include_path");
	ini_set("include_path", $CONFIG['zend']['include_path'].PATH_SEPARATOR.$inc_path);

	if( isset($CONFIG['zend']['modules']) && is_array($CONFIG['zend']['modules']) )
	{
		foreach( $CONFIG['zend']['modules'] as $zend )
			require_once($zend);
	}
}

/**
 * Loads a Zend module.
 * 
 * @param string $module Module name (like Zend_Http_Client_Adapter_Curl)
 * @return void
 */
function zend_load($module)
{
	$module = str_replace("_","/", str_replace(".php.php",".php","$module.php") );
	require_once($module);
}

/**
 * Returns the Zend font path.
 * 
 * @return string Absolute path in the filesysten to the fonts
 */
function zend_font_path()
{
	return __DIR__."/zend/fonts/";
}
