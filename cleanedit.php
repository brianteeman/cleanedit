<?php
/**
 * @package    cleanedit
 * @author     Brian Teeman
 * @copyright  (C) 2021 - Brian Teeman
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;

/**
 * Clean Edit Plugin by Brian Teeman
 *
 * @since  1.0.0
 */
class plgSystemCleanedit extends CMSPlugin
{
	/**
	 * Application object.
	 *
	 * @var    \Joomla\CMS\Application\CMSApplication
	 * @since  1.0.0
	 */
	protected $app;

	/**
	 * Load plugin language files automatically
	 *
	 * @var    boolean
	 * @since  1.0.0
	 */
	protected $autoloadLanguage = true;

	/**
	 * Let the plugin do its magic
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */

	function onAfterRoute() {
		$input      = $this->app->input;
		$controller = $input->getCmd('controller', '');
		$option     = $input->getCmd('option', '');
		$aid        = (int) $input->getInt('a_id', 0);
		$id         = (int) $input->getInt('id', 0);
		$layout     = $input->getCmd('layout', '');
		$tid        = (int) $this->params->get('edittemplateid', 0);
		$mode       = (boolean) $this->params->get('editmode', false);

		if ($option === 'com_content' && $layout === 'edit' && $aid > 0)
		{
			$input->set('templateStyle', $tid);
			if ($mode)
			{
				$input->set('tmpl', 'component');
			}
		}
	}
}

