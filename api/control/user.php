<?php

require_once '../../include/api.php';
require_once '../../include/user_location.php';

class ApiPage extends ControlApiPageBase
{
	protected function prepare_response()
	{
		global $_lang;
		// echo '<pre>';
		// print_r($_REQUEST);
		// echo '</pre>';
	
		$term = '';
		if (isset($_REQUEST['term']))
		{
			$term = $_REQUEST['term'];
		}
		
		$num = 16;
		if (isset($_REQUEST['num']) && is_numeric($_REQUEST['num']))
		{
			$num = $_REQUEST['num'];
		}
		
		if ($term == '')
		{
			$query = new DbQuery(
				'SELECT u.id, nu.name, NULL, ni.name'.
				' FROM users u'.
				' JOIN names nu ON nu.id = u.name_id AND (nu.langs & '.$_lang.') <> 0'.
				' JOIN cities i ON i.id = u.city_id'.
				' JOIN names ni ON ni.id = i.name_id AND (ni.langs & '.$_lang.') <> 0'.
				' WHERE TRUE');
			if (isset($_REQUEST['event']))
			{
				$query->add(' AND u.id IN (SELECT DISTINCT p.user_id FROM players p JOIN games g ON g.id = p.game_id WHERE g.event_id = ?)', $_REQUEST['event']);
			}
			else if (isset($_REQUEST['tournament']))
			{
				list($tournament_flags) = Db::record(get_label('tournament'), 'SELECT flags FROM tournaments WHERE id = ?', $_REQUEST['tournament']);
				if ($tournament_flags & TOURNAMENT_FLAG_MANUAL_SCORE)
				{
					$query->add(' AND u.id IN (SELECT user_id FROM tournament_places WHERE tournament_id = ?)', $_REQUEST['tournament']);
				}
				else
				{
					$query->add(' AND u.id IN (SELECT DISTINCT p.user_id FROM players p JOIN games g ON g.id = p.game_id WHERE g.tournament_id = ?)', $_REQUEST['tournament']);
				}
			}
			else if (isset($_REQUEST['club']))
			{
				$query->add(' AND u.club_id = ?', $_REQUEST['club']);
			}
			else if (isset($_REQUEST['series']))
			{
				$query->add(' AND u.id IN (SELECT p1.user_id FROM tournament_places p1 JOIN series_tournaments s1 ON s1.tournament_id = p1.tournament_id AND s1.series_id = ?)', $_REQUEST['series']);
			}
			$query->add(' ORDER BY rating DESC');
		}
		else
		{
			$query = new DbQuery(
				'SELECT u.id, nu.name as user_name, NULL, ni.name FROM users u' .
					' JOIN names nu ON nu.id = u.name_id AND (nu.langs & '.$_lang.') <> 0' .
					' JOIN cities i ON i.id = u.city_id'.
					' JOIN names ni ON ni.id = i.name_id AND (ni.langs & '.$_lang.') <> 0'.
					' WHERE nu.name LIKE ?' .
					' UNION' .
					' SELECT DISTINCT u.id, nu.name as user_name, r.nickname, ni.name FROM users u' . 
					' JOIN names nu ON nu.id = u.name_id AND (nu.langs & '.$_lang.') <> 0' .
					' JOIN cities i ON i.id = u.city_id'.
					' JOIN names ni ON ni.id = i.name_id AND (ni.langs & '.$_lang.') <> 0'.
					' JOIN event_users r ON r.user_id = u.id' .
					' WHERE r.nickname <> nu.name AND r.nickname LIKE ? ORDER BY user_name',
				'%' . $term . '%',
				'%' . $term . '%');
		}
		if ($num > 0)
		{
			$query->add(' LIMIT ' . $num);
		}
		
		if (!isset($_REQUEST['must']))
		{
			$player = new stdClass();
			$player->id = 0;
			$player->label = $player->name = $player->nickname = $player->city = '-';
			$this->response[] = $player;
		}
		
		while ($row = $query->next())
		{
			$player = new stdClass();
			list ($player->id, $player->name, $nickname, $player->city) = $row;
			$player->id = (int)$player->id;
			$player->label = $player->name . ', ' . $player->city;
			if ($nickname != NULL)
			{
				$player->nickname = $nickname;
				$player->label .= ' (' . $nickname . ')';
			}
			$this->response[] = $player;
		}
	}
	
	protected function show_help()
	{
		$this->show_help_title();
		$this->show_help_request_params_head();
?>
		<dt>term</dt>
			<dd>Search string. Only the users with the matching names are returned. For example <a href="user.php?term=al">/api/control/user.php?term=al</a> returns only users with "al" in their name.</dd>
		<dt>num</dt>
			<dd>Number of users to return. Default is 16. For example <a href="user.php?term=al">/api/control/user.php?num=4</a> returns only 4 users.</dd>
		<dt>event</dt>
			<dd>Event id. Only the users who were participating in this event are returned. For example <a href="user.php?event=7927">/api/control/user.php?event=7927</a> users who played on VaWaCa-2017 main round.</dd>
		<dt>tournament</dt>
			<dd>Tournament id. Only the users who were participating in this tournament are returned. For example <a href="user.php?tournament=26">/api/control/user.php?tournament=26</a> users who played on Police Academy tournament.</dd>
		<dt>club</dt>
			<dd>Club id. Only the members of this club are returned.  For example <a href="user.php?club=41">/api/control/user.php?club=41</a> returns only the members of The Black Cat club.</dd>
<?php
	}
}

$page = new ApiPage();
$page->run('User List');

?>