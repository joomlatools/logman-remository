<?php
/**
 * @package     LOGman
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */


/**
 * Remository LOGman Plugin.
 *
 * Provides event handlers for dealing with Remository events.
 *
 * @author  Arunas Mazeika <https://github.com/amazeika>
 * @package Joomlatools\Plugin\LOGman
 */
class PlgLogmanRemository extends ComLogmanPluginJoomla
{
    /**
     * Save event handler.
     *
     * @param $file
     * @param $id
     * @param $user
     */
    public function remositoryUploadSaved($file, $id, $user)
    {
        $this->log(array(
            'object' => array(
                'package'  => 'remository',
                'type'     => 'file',
                'id'       => $file->id,
                'name'     => $file->filetitle,
                'metadata' => array('repnum' => $file->repnum)
            ),
            'verb'   => $id === 0 ? 'add' : 'edit',
            'actor'  => $user->id
        ));
    }

    /**
     * Delete event handler.
     *
     * @param $id
     */
    public function onRemositoryAboutToDelete($id)
    {
        $query = $this->getObject('lib:database.query.select')->table('downloads_files')->columns(
            array(
                'id',
                'filetitle',
                'repnum'
            )
        )->where('id = :id')->bind(array('id' => $id));

        $file = $this->getObject('lib:database.adapter.mysqli')->select($query, KDatabase::FETCH_OBJECT);

        $this->log(array(
            'object' => array(
                'package'  => 'remository',
                'type'     => 'file',
                'id'       => $file->id,
                'name'     => $file->filetitle,
                'metadata' => array('repnum' => $file->repnum)
            ),
            'verb'   => 'delete'
        ));
    }

    /**
     * Download event handler.
     *
     * @param $file
     * @param $len
     * @param $user
     * @param $repository
     * @param $database
     */
    public function remositoryDoneDownload($file, $len, $user, $repository, $database)
    {
        $this->log(array(
            'object' => array(
                'package'  => 'remository',
                'type'     => 'file',
                'id'       => $file->id,
                'name'     => $file->filetitle,
                'metadata' => array('repnum' => $file->repnum)
            ),
            'verb'   => 'download',
            'result' => 'downloaded'
        ));
    }

    /**
     * Comment event handler.
     *
     * @param $file
     */
    public function remositoryNewFileComment($file)
    {
        $this->log(array(
            'object' => array(
                'package'  => 'remository',
                'type'     => 'file',
                'id'       => $file->id,
                'name'     => $file->filetitle,
                'metadata' => array('repnum' => $file->repnum)
            ),
            'verb'   => 'comment',
            'result' => 'commented'
        ));
    }
}