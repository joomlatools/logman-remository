<?php
/**
 * @package     LOGman
 * @copyright   Copyright (C) 2011 - 2016 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

/**
 * Remository Activity Entity
 *
 * @author  Arunas Mazeika <https://github.com/amazeika>
 * @package Joomlatools\Plugin\LOGman
 */
class PlgLogmanRemositoryActivityRemository extends ComLogmanModelEntityActivity
{
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'format'        => '{actor} {action} {object.subtype} {object.type} title {object}',
            'object_table'  => 'downloads_files',
            'object_column' => 'id'
        ));

        parent::_initialize($config);
    }

    public function getPropertyImage()
    {
        $images = array(
            'download' => 'k-icon-data-transfer-download',
            'comment'  => 'k-icon-comment-square'
        );

        if (in_array($this->verb, array_keys($images))) {
            $image = $images[$this->verb];
        } else {
            $image = parent::getPropertyImage();
        }

        return $image;
    }

    protected function _objectConfig(KObjectConfig $config)
    {
        $config->append(array(
            'subtype' => array('object' => true, 'objectName' => 'Remository'),
            'url'     => array(
                'admin' => 'option=com_' . $this->package . '&act=files&task=edit&cfid=' . $this->row . '&repnum=' .
                           $this->getMetadata()->repnum
            )
        ));

        parent::_objectConfig($config);
    }
}