<?php

require_once '../../include/api.php';
require_once '../../include/image.php';
require_once '../../include/game.php';
require_once '../../include/rules.php';
require_once '../../include/snapshot.php';

class ApiPage extends OpsApiPageBase
{
	//-------------------------------------------------------------------------------------------------------
	// lock
	//-------------------------------------------------------------------------------------------------------
	function lock_op()
	{
		lock_site(true);
	}
	
	// No help. We want to keep this API internal.
	// function lock_op_help()
	// {
	// }
	
	function lock_op_permissions()
	{
		return PERMISSION_ADMIN;
	}

	//-------------------------------------------------------------------------------------------------------
	// unlock
	//-------------------------------------------------------------------------------------------------------
	function unlock_op()
	{
		lock_site(false);
	}
	
	// No help. We want to keep this API internal.
	// function unlock_op_help()
	// {
	// }
	
	function unlock_op_permissions()
	{
		return PERMISSION_ADMIN;
	}

	//-------------------------------------------------------------------------------------------------------
	// addr_icons
	//-------------------------------------------------------------------------------------------------------
	function addr_icons_op()
	{
		$last_id = 0;
		if (isset($_REQUEST['last_id']))
		{
			$last_id = $_REQUEST['last_id'];
		}
		else
		{
			list ($count) = Db::record('address', 'SELECT count(*) FROM addresses WHERE (flags & ' . ADDRESS_ICON_MASK . ') <> 0');
			$this->response['count'] = $count;
			lock_site(true);
		}
		$c = 0;
		$query = new DbQuery('SELECT id FROM addresses WHERE (flags & ' . ADDRESS_ICON_MASK . ') <> 0 AND id > ? ORDER BY id LIMIT 10', $last_id);
		while ($row = $query->next())
		{
			list($id) = $row;
			$last_id = $id;
			++$c;
			try
			{
				build_pic_tnail('../../' . ADDRESS_PICS_DIR, $id);
			}
			catch (Exception $e)
			{
				echo $e->getMessage() . '<br>';
			}
		}
		$this->response['recs'] = $c;
		$this->response['last_id'] = $last_id;
		if ($c <= 0)
		{
			lock_site(false);
		}
	}
	
	// No help. We want to keep this API internal.
	// function addr_icons_op_help()
	// {
	// }
	
	function addr_icons_op_permissions()
	{
		return PERMISSION_ADMIN;
	}

	//-------------------------------------------------------------------------------------------------------
	// user_icons
	//-------------------------------------------------------------------------------------------------------
	function user_icons_op()
	{
		$last_id = 0;
		if (isset($_REQUEST['last_id']))
		{
			$last_id = $_REQUEST['last_id'];
		}
		else
		{
			list ($count) = Db::record('user', 'SELECT count(*) FROM users WHERE (flags & ' . USER_ICON_MASK . ') <> 0');
			$this->response['count'] = $count;
			lock_site(true);
		}
		$c = 0;
		$query = new DbQuery('SELECT id FROM users WHERE (flags & ' . USER_ICON_MASK . ') <> 0 AND id > ? ORDER BY id LIMIT 10', $last_id);
		while ($row = $query->next())
		{
			list($id) = $row;
			$last_id = $id;
			++$c;
			try
			{
				build_pic_tnail('../../' . USER_PICS_DIR, $id);
			}
			catch (Exception $e)
			{
				echo $e->getMessage() . '<br>';
			}
		}
		$this->response['recs'] = $c;
		$this->response['last_id'] = $last_id;
		if ($c <= 0)
		{
			lock_site(false);
		}
	}
	
	// No help. We want to keep this API internal.
	// function user_icons_op_help()
	// {
	// }
	
	function user_icons_op_permissions()
	{
		return PERMISSION_ADMIN;
	}

	//-------------------------------------------------------------------------------------------------------
	// club_icons
	//-------------------------------------------------------------------------------------------------------
	function club_icons_op()
	{
		$last_id = 0;
		if (isset($_REQUEST['last_id']))
		{
			$last_id = $_REQUEST['last_id'];
		}
		else
		{
			list ($count) = Db::record('club', 'SELECT count(*) FROM clubs WHERE (flags & ' . CLUB_ICON_MASK . ') <> 0');
			$this->response['count'] = $count;
			lock_site(true);
		}
		$c = 0;
		$query = new DbQuery('SELECT id FROM clubs WHERE (flags & ' . CLUB_ICON_MASK . ') <> 0 AND id > ? ORDER BY id LIMIT 10', $last_id);
		while ($row = $query->next())
		{
			list($id) = $row;
			$last_id = $id;
			++$c;
			try
			{
				build_pic_tnail('../../' . CLUB_PICS_DIR, $id);
			}
			catch (Exception $e)
			{
				echo $e->getMessage() . '<br>';
			}
		}
		$this->response['recs'] = $c;
		$this->response['last_id'] = $last_id;
		if ($c <= 0)
		{
			lock_site(false);
		}
	}
	
	// No help. We want to keep this API internal.
	// function club_icons_op_help()
	// {
	// }
	
	function club_icons_op_permissions()
	{
		return PERMISSION_ADMIN;
	}

	//-------------------------------------------------------------------------------------------------------
	// album_icons
	//-------------------------------------------------------------------------------------------------------
	function album_icons_op()
	{
		$last_id = 0;
		if (isset($_REQUEST['last_id']))
		{
			$last_id = $_REQUEST['last_id'];
		}
		else
		{
			list ($count) = Db::record('album', 'SELECT count(*) FROM photo_albums WHERE (flags & ' . ALBUM_ICON_MASK . ') <> 0');
			$this->response['count'] = $count;
			lock_site(true);
		}
		$c = 0;
		$query = new DbQuery('SELECT id FROM photo_albums WHERE (flags & ' . ALBUM_ICON_MASK . ') <> 0 AND id > ? ORDER BY id LIMIT 10', $last_id);
		while ($row = $query->next())
		{
			list($id) = $row;
			$last_id = $id;
			++$c;
			try
			{
				build_pic_tnail('../../' . ALBUM_PICS_DIR, $id);
			}
			catch (Exception $e)
			{
				echo $e->getMessage() . '<br>';
			}
		}
		$this->response['recs'] = $c;
		$this->response['last_id'] = $last_id;
		if ($c <= 0)
		{
			lock_site(false);
		}
	}
	
	// No help. We want to keep this API internal.
	// function album_icons_op_help()
	// {
	// }
	
	function album_icons_op_permissions()
	{
		return PERMISSION_ADMIN;
	}

	//-------------------------------------------------------------------------------------------------------
	// photo_icons
	//-------------------------------------------------------------------------------------------------------
	function photo_icons_op()
	{
		$last_id = 0;
		if (isset($_REQUEST['last_id']))
		{
			$last_id = $_REQUEST['last_id'];
		}
		else
		{
			list ($count) = Db::record('photo', 'SELECT count(*) FROM photos');
			$this->response['count'] = $count;
			lock_site(true);
		}
		$c = 0;
		$query = new DbQuery('SELECT id FROM photos WHERE id > ? ORDER BY id LIMIT 10', $last_id);
		while ($row = $query->next())
		{
			list($id) = $row;
			$last_id = $id;
			++$c;
			try
			{
				build_photo_tnail('../../' . PHOTOS_DIR, $id);
			}
			catch (Exception $e)
			{
				echo $e->getMessage() . '<br>';
			}
		}
		$this->response['recs'] = $c;
		$this->response['last_id'] = $last_id;
		if ($c <= 0)
		{
			lock_site(false);
		}
	}
	
	// No help. We want to keep this API internal.
	// function photo_icons_op_help()
	// {
	// }
	
	function photo_icons_op_permissions()
	{
		return PERMISSION_ADMIN;
	}

	//-------------------------------------------------------------------------------------------------------
	// stats
	//-------------------------------------------------------------------------------------------------------
	function stats_op()
	{
		$last_id = 0;
		$query = new DbQuery('SELECT id, json, feature_flags, end_time, canceled FROM games WHERE result > 0');
		if (isset($_REQUEST['last_id']))
		{
			$last_id = $_REQUEST['last_id'];
			list($last_end) = Db::record(get_label('game'), 'SELECT end_time FROM games WHERE id = ?', $last_id);
			$query->add(' AND (end_time > ? OR (end_time = ? AND id > ?))', $last_end, $last_end, $last_id);
		}
		else
		{
			list ($count) = Db::record('games', 'SELECT count(*) FROM games WHERE result > 0');
			$this->response['count'] = $count;
			lock_site(true);
		}
		$query->add(' ORDER BY end_time, id LIMIT 10');
		$c = 0;
		$games = array();
		while ($row = $query->next())
		{
			$games[] = $row;
		}
		
		foreach ($games as $row)
		{
			list($id, $json, $features, $end_time, $is_canceled) = $row;
			$last_id = $id;
			++$c;
			try
			{
				Db::begin();
				$game = new Game($json, $features);
				$game->update();
				Db::commit();
			}
			catch (Exception $e)
			{
				Db::rollback();
				echo 'Game ' . $id . ': ' . $e->getMessage() . '<br>';
			}
		}
		$this->response['recs'] = $c;
		$this->response['last_id'] = $last_id;
		if ($c <= 0)
		{
			lock_site(false);
		}
	}
	
	// No help. We want to keep this API internal.
	// function stats_op_help()
	// {
	// }
	
	function stats_op_permissions()
	{
		return PERMISSION_ADMIN;
	}
	
	//-------------------------------------------------------------------------------------------------------
	// delete_error_log
	//-------------------------------------------------------------------------------------------------------
	function delete_error_log_op()
	{
		$dir = get_required_param('dir');
		$filename = '../../' . $dir . 'error.log';
		if (!unlink($filename))
		{
			throw new Exc('Failed to delete ' . $filename);
		}
	}
	
	// No help. We want to keep this API internal.
	// function delete_error_log_op_help()
	// {
		// $help = new ApiHelp(PERMISSION_ADMIN, 'Delete error log file.');
		// return $help;
	// }
	
	function delete_error_log_op_permissions()
	{
		return PERMISSION_ADMIN;
	}
}

// No version support. We want to keep this API internal.
$page = new ApiPage();
$page->run('Repair Operations', -1, PERMISSION_ADMIN);

?>