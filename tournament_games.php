<?php

require_once 'include/tournament.php';
require_once 'include/club.php';
require_once 'include/pages.php';

define("PAGE_SIZE", 20);

class Page extends TournamentPageBase
{
	protected function show_body()
	{
		global $_page;
		
		$is_manager = is_permitted(PERMISSION_CLUB_MANAGER, $this->club_id);
		
		$result_filter = -1;
		if (isset($_REQUEST['results']))
		{
			$result_filter = (int)$_REQUEST['results'];
			if ($result_filter == 0 && !$is_manager)
			{
				$result_filter = -1;
			}
		}
		
		$with_video = isset($_REQUEST['video']);
	
		$condition = new SQL(' WHERE g.tournament_id = ?', $this->id);
		if ($result_filter < 0)
		{
			$condition->add(' AND g.result <> 0');
		}
		else
		{
			$condition->add(' AND g.result = ?', $result_filter);
		}
		
		if ($with_video)
		{
			$condition->add(' AND g.video_id IS NOT NULL');
		}
		
		list ($count) = Db::record(get_label('game'), 'SELECT count(*) FROM games g', $condition);
		show_pages_navigation(PAGE_SIZE, $count);
		
		echo '<p><form method="get" name="form" action="tournament_games.php">';
		echo '<table class="transp" width="100%"><tr><td>';
		echo '<input type="hidden" name="id" value="' . $this->id . '">';
		echo '<select name="results" onChange="document.form.submit()">';
		show_option(-1, $result_filter, get_label('All games'));
		show_option(1, $result_filter, get_label('Town wins'));
		show_option(2, $result_filter, get_label('Mafia wins'));
		if ($is_manager)
		{
			show_option(0, $result_filter, get_label('Unfinished games'));
		}
		echo '</select>';
		echo ' <input type="checkbox" name="video" onclick="document.form.submit()"';
		if ($with_video)
		{
			echo ' checked';
		}
		echo '> ' . get_label('show only games with video');
		echo '</td></tr></table></form></p>';
		
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
		echo '>&nbsp;</td><td width="120">'.get_label('Time').'</td><td width="60">'.get_label('Duration').'</td><td width="60">'.get_label('Result').'</td><td width="60">'.get_label('Video').'</td></tr>';
		$query = new DbQuery(
			'SELECT g.id, ct.timezone, m.id, m.name, m.flags, g.start_time, g.end_time - g.start_time, g.result, g.video_id, g.canceled, e.id, e.name, e.flags FROM games g' .
				' JOIN clubs c ON c.id = g.club_id' .
				' JOIN events e ON e.id = g.event_id' .
				' LEFT OUTER JOIN users m ON m.id = g.moderator_id' .
				' JOIN cities ct ON ct.id = c.city_id',
			$condition);
		$query->add(' ORDER BY g.end_time DESC, g.id DESC LIMIT ' . ($_page * PAGE_SIZE) . ',' . PAGE_SIZE);
		while ($row = $query->next())
		{
			list ($game_id, $timezone, $moder_id, $moder_name, $moder_flags, $start, $duration, $game_result, $video_id, $is_canceled, $event_id, $event_name, $event_flags) = $row;
			
			echo '<tr align="center"';
			if ($is_canceled)
			{
				echo ' class="dark"';
			}
			echo '>';
			
			if ($is_manager)
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
				echo '<td align="left"><s>';
			}
			else
			{
				echo '<td align="left" colspan="2">';
			}
			echo '<a href="view_game.php?tournament_id=' . $this->id . '&id=' . $game_id . '&bck=1">' . get_label('Game #[0]', $game_id) . '</a>';
			if ($is_canceled)
			{
				echo '</s></td><td width="150" class="darker"><b>' . get_label('Game canceled') . '</b></td>';
			}
			echo '</td>';
			
			echo '<td width="120">' . $event_name . '</td>';
			
			if ($is_canceled)
			{
				echo '<td><s>' . format_date('M j Y, H:i', $start, $timezone) . '</s></td>';
				echo '<td><s>' . format_time($duration) . '</s></td>';
			}
			else
			{
				echo '<td>' . format_date('M j Y, H:i', $start, $timezone) . '</td>';
				echo '<td>' . format_time($duration) . '</td>';
			}
			
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
}

$page = new Page();
$page->run(get_label('Games'));

?>