<?php
require_once 'include/page_base.php';
require_once 'include/player_stats.php';
require_once 'include/image.php';
require_once 'include/address.php';
require_once 'include/pages.php';
require_once 'include/user.php';
require_once 'include/event.php';
require_once 'include/games.php';

define("PAGE_SIZE", 20);

class Page extends AddressPageBase
{
	protected function show_body()
	{
		global $_page;
		
		$result_filter = -1;
		if (isset($_REQUEST['results']))
		{
			$result_filter = (int)$_REQUEST['results'];
			if ($result_filter == 0 && !$this->is_manager)
			{
				$result_filter = -1;
			}
		}
		
		$filter = GAMES_FILTER_ALL;
		if (isset($_REQUEST['filter']))
		{
			$filter = (int)$_REQUEST['filter'];
		}
		
		echo '<p><table class="transp" width="100%"><tr><td>';
		echo '<select id="results" onChange="filterChanged()">';
		show_option(-1, $result_filter, get_label('All games'));
		show_option(1, $result_filter, get_label('Town wins'));
		show_option(2, $result_filter, get_label('Mafia wins'));
		if ($this->is_manager)
		{
			show_option(0, $result_filter, get_label('Unfinished games'));
		}
		echo '</select>';
		show_games_filter($filter, 'filterChanged');
		echo '</td></tr></table></p>';

		$condition = new SQL(' WHERE e.address_id = ?', $this->id);
		if ($result_filter < 0)
		{
			$condition->add(' AND g.result <> 0');
		}
		else
		{
			$condition->add(' AND g.result = ?', $result_filter);
		}
		
		$condition->add(get_games_filter_condition($filter));
		
		list ($count) = Db::record(get_label('game'), 'SELECT count(*) FROM games g JOIN events e ON e.id = g.event_id', $condition);
		show_pages_navigation(PAGE_SIZE, $count);
		
		$event_pic = new Picture(EVENT_PICTURE);
		$tournament_pic = new Picture(TOURNAMENT_PICTURE, new Picture(LEAGUE_PICTURE));
		$moder_pic = new Picture(USER_PICTURE);
		$is_user = is_permitted(PERMISSION_USER);
		echo '<table class="bordered light" width="100%">';
		echo '<tr class="th darker" align="center"><td';
		if ($is_user)
		{
			echo ' colspan="4"';
		}
		else
		{
			echo ' colspan="3"';
		}
		echo '>&nbsp;</td><td width="48">'.get_label('Event').'</td><td width="48">'.get_label('Tournament').'</td><td width="48">'.get_label('Moderator').'</td><td width="48">'.get_label('Result').'</td><td width="48">'.get_label('Video').'</td></tr>';
		$query = new DbQuery(
			'SELECT g.id, g.flags, m.id, m.name, m.flags, g.start_time, g.end_time - g.start_time, g.result, g.video_id, g.canceled, e.id, e.name, e.flags, t.id, t.name, t.flags, l.id, l.name, l.flags FROM games g' .
			' JOIN events e ON e.id = g.event_id' .
			' LEFT OUTER JOIN tournaments t ON t.id = g.tournament_id' .
			' LEFT OUTER JOIN leagues l ON l.id = t.league_id' .
			' LEFT OUTER JOIN users m ON m.id = g.moderator_id',
			$condition);
		$query->add(' ORDER BY g.end_time DESC, g.id DESC LIMIT ' . ($_page * PAGE_SIZE) . ',' . PAGE_SIZE);
		while ($row = $query->next())
		{
			list ($game_id, $game_flags, $moder_id, $moder_name, $moder_flags, $start, $duration, $game_result, $video_id, $is_canceled, $event_id, $event_name, $event_flags, $tournament_id, $tournament_name, $tournament_flags, $league_id, $league_name, $league_flags) = $row;
			
			echo '<tr align="center"';
			if ($is_canceled || ($game_flags & GAME_FLAG_FUN))
			{
				echo ' class="dark"';
			}
			echo '>';
			
			if ($this->is_manager)
			{
				echo '<td class="dark" width="120">';
				echo '<button class="icon" onclick="mr.gotoObjections(' . $game_id . ')" title="' . get_label('File an objection to the game [0] results.', $game_id) . '"><img src="images/objection.png" border="0"></button>';
				echo '<button class="icon" onclick="mr.deleteGame(' . $game_id . ', \'' . get_label('Are you sure you want to delete the game [0]?', $game_id) . '\')" title="' . get_label('Delete game [0]', $game_id) . '"><img src="images/delete.png" border="0"></button>';
				echo '<button class="icon" onclick="mr.editGame(' . $game_id . ')" title="' . get_label('Edit game [0]', $game_id) . '"><img src="images/edit.png" border="0"></button>';
				if ($video_id == NULL)
				{
					echo '<button class="icon" onclick="mr.setGameVideo(' . $game_id . ')" title="' . get_label('Add game [0] video', $game_id) . '"><img src="images/film-add.png" border="0"></button>';
				}
				else
				{
					echo '<button class="icon" onclick="mr.deleteVideo(' . $video_id . ', \'' . get_label('Are you sure you want to remove video from the game [0]?', $game_id) . '\')" title="' . get_label('Remove game [0] video', $game_id) . '"><img src="images/film-delete.png" border="0"></button>';
				}
				echo '</td>';
			}
			else if ($is_user)
			{
				echo '<td class="dark" width="30">';
				echo '<button class="icon" onclick="mr.gotoObjections(' . $game_id . ')" title="' . get_label('File an objection to the game [0] results.', $game_id) . '"><img src="images/objection.png" border="0"></button>';
				echo '</td>';
			}
			
			if ($is_canceled)
			{
				echo '<td width="120" align="left"><s>' . format_date('M j Y, H:i', $start, $this->timezone) . '</s></td>';
				echo '<td align="left"><s>';
			}
			else
			{
				echo '<td width="120" align="left">' . format_date('M j Y, H:i', $start, $this->timezone) . '</td>';
				if ($game_flags & GAME_FLAG_FUN)
				{
					echo '<td align="left">';
				}
				else
				{
					echo '<td align="left" colspan="2">';
				}
			}
			echo '<a href="view_game.php?address_id=' . $this->id . '&id=' . $game_id . '&bck=1">' . get_label('Game #[0]', $game_id);
			echo '<br>';
			if (!is_null($tournament_id))
			{
				echo $tournament_name . ': ';
			}
			echo $event_name . '</a>';
			if ($is_canceled)
			{
				echo '</s></td><td width="100" class="darker"><b>' . get_label('Canceled');
				if ($game_flags & GAME_FLAG_FUN)
				{
					echo '<br>' . get_label('Non-rating');
				}
				echo '</b></td>';
			}
			else if ($game_flags & GAME_FLAG_FUN)
			{
				echo '</td><td width="100" class="darker"><b>' . get_label('Non-rating') . '</b></td>';
			}
			echo '</td>';
			
			echo '<td>';
			$event_pic->set($event_id, $event_name, $event_flags);
			$event_pic->show(ICONS_DIR, true, 48);
			echo '</td>';
			
			echo '<td>';
			$tournament_pic
				->set($tournament_id, $tournament_name, $tournament_flags)
				->set($league_id, $league_name, $league_flags);
			$tournament_pic->show(ICONS_DIR, true, 48);
			echo '</td>';
			
			echo '<td>';
			$moder_pic->set($moder_id, $moder_name, $moder_flags);
			$moder_pic->show(ICONS_DIR, true, 48);
			echo '</td>';
			
			echo '<td>';
			switch ($game_result)
			{
				case 0:
					break;
				case 1: // civils won
					echo '<img src="images/civ.png" title="' . get_label('town\'s vicory') . '" style="opacity: 0.5;">';
					break;
				case 2: // mafia won
					echo '<img src="images/maf.png" title="' . get_label('mafia\'s vicory') . '" style="opacity: 0.5;">';
					break;
			}

			echo '</td><td>';
			if ($video_id != NULL)
			{
				echo '<button class="icon" onclick="mr.watchGameVideo(' . $game_id . ')" title="' . get_label('Watch game [0] video', $game_id) . '"><img src="images/film.png" border="0"></button>';
			}
			echo '</td></tr>';
		}
		echo '</table>';
	}
	
	protected function js()
	{
?>
		function filterChanged()
		{
			goTo({results: $('#results').val(), filter: getGamesFilter() });
		}
<?php
	}
}

$page = new Page();
$page->run(get_label('Games'));

?>