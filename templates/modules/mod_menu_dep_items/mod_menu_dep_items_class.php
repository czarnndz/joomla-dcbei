<?php
/**
* @version      $Id: mod_menu_dep_items_class.php 16 2008-08-07 17:25:57Z ludwig $
* @package      Menu Dependent Items
* @author       Christian Ludwig - viazenetti GmbH
* @copyright    Copyright (C) 2008 viazenetti GmbH. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class modMenuDependentItems
{
	/**
	 * Debug mode
	 *
	 * @var	 string
	 * @access  public
	 */
    var $debug = 0;

	/**
	 * Filename of the image or css
	 *
	 * @var	 string
	 * @access  public
	 */
    var $fileName = false;

	/**
	 * A list of all files of the given folder
	 *
	 * @var	 array
	 * @access  public
	 */
    var $fileList = array();

	/**
	 * Array with menu ItemIDs if available
	 *
	 * @var	 array
	 * @access  public
	 */
    var $menuTree = null;

	/**
	 * Constructor of the modMenuDependentItems class
	 *
	 * Sets fileExtension, type, folder and menu tree
	 *
	 * @access public
	 * @param object the module parameters as JParameter object
	 * @return void
	 */
	function modMenuDependentItems(&$params)
	{
		$this->params = &$params;
		$this->type   = $params->get('type', 'img');
		$this->debug  = $params->get('debug', 0);
        $addMenuType  = $params->get('add_menu_type', 1);

		// File Extensions
		$extension = ($this->type == 'img') ? $params->get('img_extension', 'jpg') : $params->get('css_extension' ,'css');
		$this->fileExtension = array_map('trim', explode(' ', trim(str_replace(',', ' ', $extension))));

		$this->setCleanFolder($params->get('folder'));

		// Read the menue structure
		$menu   =& JSite::getMenu();
		$active =  $menu->getActive();

        if (null !== $active) {
            if ($params->get('use_names', 0)) {
                $this->menuTree = (isset($active->route)) ? array_reverse(explode('/', $active->route)) : null;
            }
            else {
                $this->menuTree = (isset($active->tree)) ? array_reverse($active->tree) : null;
            }
            if ($addMenuType && isset($active->menutype)) {
                array_push($this->menuTree, $active->menutype);
            }
        }
	}

	/**
	 * Sets a clean folder name
	 *
	 * @access public
	 * @param string a folder name
	 * @return bolean true if folder is a directory and could be set
	 */
	function setCleanFolder($folder)
	{
		global $mainframe;

		$LiveSite = $mainframe->getCfg('live_site');

		// if folder includes livesite info, remove
		if (!empty($LiveSite)) {
			if ( JString::strpos($folder, $LiveSite) === 0 ) {
				$folder = str_replace( $LiveSite, '', $folder );
			}
		}
		// if folder includes absolute path, remove
		if ( JString::strpos($folder, JPATH_SITE) === 0 ) {
			$folder = str_replace( JPATH_BASE, '', $folder );
		}
		$folder = str_replace(array('\\', '/'),DS,$folder);

		// Set folder
        if (!is_dir(JPATH_BASE.DS.$folder)) {
			echo JText::sprintf('DEBUG_NOFOLDER', $folder);
    		$this->folder = false;
    		return false;
        }
   		$this->folder = $folder;
   		return true;
	}

	/**
	 * Returns the selected module type
	 *
	 * @access public
	 * @return string either 'css' or 'img'
	 */
	function getType()
	{
		return $this->type;
	}

	/**
	 * Returns the image object
	 *
	 * @access public
	 * @return object with height, width, src (source), alttext (alternative text) and link
	 */
	function getImage()
	{
		$size    = $this->params->get('size', 'org');
		$width   = trim($this->params->get('width'));
		$height  = trim($this->params->get('height'));
		$imgSize = @getimagesize (JPATH_BASE.DS.$this->folder .DS. $this->fileName);

		// Could image size been read from file?
		if (is_array($imgSize)) {
			$imgWidth  = $imgSize[0];
			$imgHeight = $imgSize[1];
            $this->outputDebug('<br />'.JText::sprintf('DEBUG_ORGSIZE', $imgWidth, $imgHeight).'<br />');
		}
		elseif (!($size == 'abs' && $width !== '' && $height !== '')) {
            $this->outputDebug('<br />'.JText::_('DEBUG_SIZEUNKNOWN').'<br />');
			$size = 'no';
		}

		switch ($size) {
			// No width and height wished
			case 'no' :
				$width  = '';
				$height = '';
                $this->outputDebug('<br />'.JText::_('DEBUG_NOSIZE').'<br />');
				break;

			// Set an absolute image size or use original size if empty
			case 'abs' :
				$width  = ($width !== '') ? intval($width) : $imgWidth;
				$height = ($height !== '') ? intval($height) : $imgHeight;
				break;

			// Scale image to max height/width
			case 'max' :
				$maxWidth  = $width;
				$maxHeight = $height;
				$imgCoeff  = $imgWidth/$imgHeight;
	
				// Width and height is limited
				if ($width !== '' && $height !== '') {
					$maxCoeff = $width/$height;
					if ($imgCoeff < $maxCoeff) {
						$width = '';
					}
					else {
						$height = '';
					}
				}

				// Both are empty, use original size
				if ($width === '' && $height === '') {
					$width  = $imgWidth;
					$height = $imgHeight;
				}
				// Only width is limited
				elseif ($width !== '') {
					$width  = ($imgWidth > $maxWidth) ? $maxWidth : $imgWidth;
					$height = intval($width / $imgCoeff);
				}
				// Only height is limited
				elseif ($height !== '') {
					$height = ($imgHeight > $maxHeight) ? $maxHeight : $imgHeight;
					$width  = intval($height * $imgCoeff);
				}
				break;

			// Set original image size
			default:
			case 'org' :
				$width  = $imgWidth;
				$height = $imgHeight;
				break;	
		}
        if ($size != 'no') {
            $this->outputDebug('<br />'.JText::sprintf('DEBUG_NEWSIZE', $width, $height).'<br />');
        }

		$image->widhtHeight = ($width === '' && $height === '') ? '' : ' width="'.$width.'" height="'.$height.'"';
		$image->width       = $width;
		$image->height      = $height;
		$image->link        = trim($this->params->get('link'));
		$image->src         = str_replace( '\\', '/', $this->folder ).'/'.$this->fileName;
		$image->alttext     = $this->params->get('alttext');

		return $image;
	}

	/**
	 * Returns the css object
	 *
	 * @access public
	 * @return object with media and href
	 */
	function getCss()
	{
		$css->media = trim($this->params->get('media'));
		$css->href  = str_replace( '\\', '/', $this->folder ).'/'.$this->fileName;

		return $css;
	}

	/**
	 * Sets an array containing all files of the folder
	 *
	 * @access public
	 * @param string an optional folder path
	 * @return bolean true if folder is a directory
	 */
	function setFileList($folder = null)
	{
		if (null === $folder) {
			$folder = $this->folder;
		}

		$fileList = array();

		$folder = JPATH_BASE.DS.$folder;
		if (is_dir($folder)) {
			if ($handle = opendir($folder)) {

				while (false !== ($file = readdir($handle))) {
					if ($file !=  '.' && $file != '..' && !is_dir($folder.DS.$file)) {
						$fileList[] = $file;
					}
				}
				closedir($handle);

        		$this->fileList = $fileList;
        		return true;
			}
		}
		return false;
	}

	/**
	 * Sets the filename that matches the menu id
	 * or uses the default filename if if set
	 *
	 * @access public
	 * @return bolean true on success, false if no file could be found
	 */
	function setFileName()
	{
		$prefix = $this->params->get('file_prefix', '');

    	if (is_array($this->menuTree)) {
	    	// Check for a file matching this menu id or one of the parents menu id.
	        foreach ($this->menuTree as $menuId) {
	            if ($this->checkFile($prefix.$menuId) === true) {
	                return true;
	            }
	        }
	    }
        else {
            $this->outputDebug(JText::_('DEBUG_NOMENUTREE').'<br />');
        }

        // Use default file if no matching file could be found
    	$defaultFile = trim($this->params->get('default_file'));
    	if (!empty($defaultFile)) {
            if ($this->checkFile($prefix.$defaultFile) === true) {
                return true;
            }
			echo JText::sprintf('DEBUG_NODEFAULTFOUND', $this->folder.'/'.$prefix.$defaultFile.'.'.implode('|', $this->fileExtension));
    	}
        else {
            $this->outputDebug(JText::_('DEBUG_NODEFAULT').'<br />');
        }


        return false;
    }

	/**
	 * Returns the complete filename
	 *
	 * @access public
	 * @return string the complete filename
	 */
	function getFileName()
	{
        return ($this->fileName);
    }

	/**
	 * Checks if the given filename does exist in the
     * folder. The filename will be extended by each file
     * extensions set as parameter.
	 *
	 * @access public
	 * @return bolean true on success, false if no file could be found
	 */
	function checkFile($fileName)
	{
        if (is_array($this->fileExtension)) {
	        foreach ($this->fileExtension as $extension) {
	            $this->fileName = $fileName. '.' .$extension;
                if (in_array($this->fileName, $this->fileList)) {
                    $this->outputDebug(JText::sprintf('DEBUG_MATCH', $this->fileName).'<br />');
                    return true;
	            }
                else {
                    $this->outputDebug(JText::sprintf('DEBUG_NOMATCH', $this->fileName).'<br />');
                }
	        }
	    }
        $this->fileName = false;
        return false;
	}

	/**
	 * Echos the debug text.
	 *
	 * @access public
	 * @param string that should be displayed
	 */
	function outputDebug($text)
	{
        if ($this->debug) {
            echo $text;
	    }
	}
}
