<?
/**
 * Scavix Web Development Framework
 *
 * Copyright (c) since 2012 Scavix Software Ltd. & Co. KG
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
 * @author Scavix Software Ltd. & Co. KG http://www.scavix.com <info@scavix.com>
 * @copyright since 2012 Scavix Software Ltd. & Co. KG
 * @license http://www.opensource.org/licenses/lgpl-license.php LGPL
 */

/**
 * This is an inline message.
 * 
 * Will use the jQueryUI standard theming.
 * @attribute[Resource('jquery-ui/ui.message.css')]
 */
class uiMessage extends uiControl
{
	function __initialize($message,$type='highlight')
	{
		parent::__initialize('div');
		$this->class = "ui-widget ui-message";
		
		if( function_exists('translation_string_exists') && translation_string_exists($message) )
			$message = getString($message);
		$icon = $type=='highlight'?'info':'alert';
		
		$sub = $this->content( new Control('div') );
		$sub->class = "ui-state-$type ui-corner-all";
		$sub->content("<span class='ui-icon ui-icon-close' onclick=\"$(this).parent().parent().slideUp('fast', function(){ $(this).remove(); })\"></span>");
		$sub->content("<p><span class='ui-icon ui-icon-$icon'></span>$message</p>");
	}
	
	/**
	 * Creates a new uiMessage as hint.
	 * 
	 * @param string $message Hint text
	 * @return uiMessage A new uiMessage 
	 */
	static function Hint($message)
	{
		return new uiMessage($message);
	}
	
	/**
	 * Creates a new uiMessage as error.
	 * 
	 * @param string $message Error text
	 * @return uiMessage A new uiMessage 
	 */
	static function Error($message)
	{
		return new uiMessage($message,'error');
	}
}
