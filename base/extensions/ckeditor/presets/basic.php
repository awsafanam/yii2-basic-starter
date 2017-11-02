<?php

/**
 *
 * basic preset returns the basic toolbar configuration set for CKEditor.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */
return [
	'height' => 200,
	'toolbarGroups' => [
		['name' => 'undo'],
		['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
		['name' => 'colors'],
		['name' => 'links', 'groups' => ['links', 'insert']],
		['name' => 'others','groups' => ['mode','others']],
	],
	'removeButtons' => 'Flash,PageBreak,Smiley,Iframe',
	'removePlugins' => 'elementspath,help',
	'resize_enabled' => false
];
