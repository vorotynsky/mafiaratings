<?php

require_once '../include/session.php';
require_once '../include/city.php';
require_once '../include/country.php';
require_once '../include/club.php';

initiate_session();

try
{
	dialog_title(get_label('Accept club request'));

	if (!isset($_REQUEST['id']))
	{
		throw new FatalExc(get_label('Unknown [0]', get_label('club')));
	}
	$id = $_REQUEST['id'];
	
	list($club_id, $club_name, $club_flags, $name, $city_id, $city, $country, $url, $langs, $user_id, $user_name, $user_email, $user_lang, $user_flags, $email, $phone, $parent_id, $parent_name, $parent_flags) = Db::record(
		get_label('club'),
		'SELECT c.club_id, cl.name, cl.flags, c.name, c.city_id, i.name_' . $_lang_code . ', o.name_' . $_lang_code . ', c.web_site, c.langs, c.user_id, u.name, u.email, u.def_lang, u.flags, c.email, c.phone, c.parent_id, p.name, p.flags FROM club_requests c' .
			' JOIN users u ON c.user_id = u.id' .
			' LEFT OUTER JOIN cities i ON c.city_id = i.id' .
			' LEFT OUTER JOIN countries o ON i.country_id = o.id' .
			' LEFT OUTER JOIN clubs p ON c.parent_id = p.id' .
			' LEFT OUTER JOIN clubs cl ON c.club_id = cl.id' .
			' WHERE c.id = ?',
		$id);
		
	if ($parent_id == NULL)
	{
		check_permissions(PERMISSION_ADMIN);
	}
	else
	{
		check_permissions(PERMISSION_CLUB_MANAGER, $parent_id);
	}
		
	echo '<table class="dialog_form" width="100%">';
	echo '<tr><td colspan="2" align="center">' . get_club_request_action($name, $club_id, $club_name, $parent_id, $parent_name) . '</td></tr>';
	
	echo '<tr><td width="120">' . get_label('User') . ':</td><td><a href="user_info.php?id=' . $user_id . '&bck=1">' . $user_name . '</a></td></tr>';
	if ($club_id != NULL)
	{
		echo '<tr><td>' . get_label('Club') . ':</td><td><input type="hidden" id="form-name" value="">';
		echo '<table class="transp" width="100%"><tr><td width="50">';
		show_club_pic($club_id, $club_name, $club_flags, ICONS_DIR, 36, 36);
		echo '</td><td>' . $club_name . '</td></tr></table>';
		echo '</td></tr>';
	}
	else
	{
		echo '<tr><td>' . get_label('Club name') . ':</td><td><input class="longest" id="form-name" value="' . $name . '"></td></tr>';
	}
	
	if ($parent_name != NULL)
	{
		echo '<tr><td>' . get_label('Club system') . ':</td><td>';
		echo '<table class="transp" width="100%"><tr><td width="50">';
		show_club_pic($parent_id, $parent_name, $parent_flags, ICONS_DIR, 36, 36);
		echo '</td><td>' . $parent_name . '</td></tr></table>';
		echo '</td></tr>';
	}
	
	if ($club_id == NULL)
	{
		echo '<tr><td>' . get_label('Web site') . ':</td><td><a href="' . $url . '" target="_blank">' . $url . '</a></td></tr>';
		echo '<tr><td>'.get_label('Languages').':</td><td>' . get_langs_str($langs, ', ') . '</td><tr>';
		echo '<tr><td>'.get_label('Contact email').':</td><td><a href="mailto:' . $email . '">' . $email . '</a></td><tr>';
		echo '<tr><td>'.get_label('Contact phone(s)').':</td><td>' . $phone . '</td><tr>';
		echo '<tr><td>'.get_label('City').':</td><td>' . $city . ', ' . $country . '</td><tr>';
	}
	echo '</table>';
	
?>
	<script>
	function commit(onSuccess)
	{
		json.post("api/ops/club.php",
		{
			op: "accept"
			, request_id: <?php echo $id; ?>
			, name: $("#form-name").val()
		},
		onSuccess);
	}
	</script>
<?php
	echo '<ok>';
}
catch (Exception $e)
{
	Exc::log($e);
	echo '<error=' . $e->getMessage() . '>';
}

?>