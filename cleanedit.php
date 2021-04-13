<?php
/**
 * @package    cleanedit
 * @author     Brian Teeman
 * @copyright  (C) 2021 - Brian Teeman
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;

/**
 * Clean Edit Plugin by Brian Teeman
 *
 * @since  1.0.0
 */
class plgSystemCleanedit extends JPlugin
{
	/**
	 * Application object.
	 *
	 * @var    JApplicationCms
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
		$app        = Factory::getApplication();
		$controller = $app->input->getCmd('controller', '');
		$option     = $app->input->getCmd('option', '');
		$aid        = $app->input->getCmd('a_id', 0);
		$id         = $app->input->getCmd('id', 0);
		$layout     = $app->input->getCmd('layout', '');
		$tid        = $this->params->get('edittemplateid', 0);
		$mode       = $this->params->get('editmode', 0);

		if ($option == 'com_content' && $layout == 'edit' && $aid > 0)
		{
			$app->input->set('templateStyle', $tid);
			if ($mode == 1)
			{
				$app->input->set('tmpl', 'component');
			}
		}
	}
}

