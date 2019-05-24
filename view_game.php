<?php

require_once 'include/view_game.php';

class Page extends ViewGamePageBase
{
	protected function show_body()
	{
		$is_manager = is_permitted(PERMISSION_CLUB_MANAGER, $this->vg->club_id);
		
		echo '<table class="bordered" width="100%" id="players">';
		echo '<tr class="th darker"><td width="30">&nbsp;</td>';
		if ($is_manager)
		{
			echo '<td colspan="3">';
		}
		else
		{
			echo '<td colspan="2">';
		}
		echo get_label('Player').'</td>';
		echo '<td width="50" align="center">'.get_label('The Sheriff\'s check').'</td>';
		echo '<td width="50" align="center">'.get_label('The Don\'s check').'</td>';
		echo '<td width="50" align="center">'.get_label('Mafia arrangement').'</td>';
		echo '<td width="50" align="center">'.get_label('Killed').'</td>';
		echo '<td width="50" align="center">'.get_label('Warnings').'</td>';
		echo '<td width="50" align="center">'.get_label('Role').'</td></tr>';
		for ($i = 0; $i < 10; ++$i)
		{
			$player = $this->vg->gs->players[$i];
			$player_score = $this->vg->players[$i];
			// if ($player->id == $this->vg->mark_player)
			// {
				// echo '<tr class="lighter">';
			// }
			// else
			// {
				echo '<tr class="light">';
			// }
			echo '<td class="dark" align="center">' . ($i + 1) . '</td>';
			$this->show_player_name($player, $player_score);
			
			if ($is_manager)
			{
				echo '<td width="24"><button class="icon" onclick="mr.gameExtraPoints(' . $this->vg->gs->id  . ', ' . $player->id . ')"><img src="images/star-empty.png"></button></td>';
			}
			echo '<td align="center">' . $player->sheriff_check_text() . '</td>';
			echo '<td align="center">' . $player->don_check_text() . '</td>';
			echo '<td align="center">' . $player->arranged_text() . '</td>';
			echo '<td align="center">' . $player->killed_text() . '</td>';
			echo '<td align="center">' . $player->warnings_text() . '</td>';
			$this->show_player_role($player);
		}
		echo '</table>';
		
		parent::show_body();
	}
}

$page = new Page();
$page->run(get_label('Game'));

?>