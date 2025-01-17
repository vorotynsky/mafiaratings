<?php

require_once '../include/session.php';
require_once '../include/city.php';
require_once '../include/country.php';
require_once '../include/timespan.php';
require_once '../include/datetime.php';
require_once '../include/security.php';
require_once '../include/picture.php';
require_once '../include/currency.php';

initiate_session();

try
{
	dialog_title(get_label('Create [0]', get_label('sеriеs')));
	
	if (!isset($_REQUEST['league_id']))
	{
		throw new Exc(get_label('Unknown [0]', get_label('league')));
	}
	
	$league_id = (int)$_REQUEST['league_id'];
	check_permissions(PERMISSION_LEAGUE_MANAGER, $league_id);
	
	$league_id = 0;
	if (isset($_REQUEST['league_id']))
	{
		$league_id = (int)$_REQUEST['league_id'];
	}

	echo '<table class="dialog_form" width="100%">';
	list($league_name, $league_flags, $league_langs) = Db::record(get_label('league'), 'SELECT name, flags, langs FROM leagues WHERE id = ?', $league_id);
	
	echo '<tr><td colspan="2"><table class="transp" width="100%"><tr><td width="' . ICON_WIDTH . '">';
	$league_pic = new Picture(LEAGUE_PICTURE);
	$league_pic->set($league_id, $league_name, $league_flags);
	$league_pic->show(ICONS_DIR, false);
	echo '</td><td align="center"><b>' . $league_name . '</b></td></tr></table></td></tr>';
	
	echo '<tr><td width="240">' . get_label('Series name') . ':</td><td><input id="form-name" value=""></td></tr>';
	
	$timezone = get_timezone();
	$datetime = get_datetime(time(), $timezone);
	$date = datetime_to_string($datetime, false);
	
	echo '<tr><td>'.get_label('Dates').':</td><td>';
	echo '<input type="date" id="form-start" value="' . $date . '" onchange="onMinDateChange()">';
	echo '  ' . get_label('to') . '  ';
	echo '<input type="date" id="form-end" value="' . $date . '">';
	echo '</td></tr>';
	
	echo '<tr><td>'.get_label('Admission rate per player-tournament').':</td><td><input type="number" min="0" style="width: 45px;" id="form-fee" value="" onchange="feeChanged()">';
	$query = new DbQuery('SELECT c.id, n.name FROM currencies c JOIN names n ON n.id = c.name_id AND (n.langs & '.$_lang.') <> 0 ORDER BY n.name');
	echo ' <input id="form-fee-unknown" type="checkbox" onclick="feeUnknownClicked()" checked> '.get_label('unknown');
	echo ' <select id="form-currency" onChange="currencyChanged()">';
	show_option(0, DEFAULT_CURRENCY, '');
	while ($row = $query->next())
	{
		list($cid, $cname) = $row;
		show_option($cid, DEFAULT_CURRENCY, $cname);
	}
	echo '</select></td></tr>';
	
	if (is_valid_lang($league_langs))
	{
		echo '<input type="hidden" id="form-langs" value="' . $league_langs . '">';
	}
	else
	{
		echo '<tr><td>'.get_label('Languages').':</td><td>';
		langs_checkboxes(LANG_ALL, $league_langs, NULL, '<br>', 'form-');
		echo '</td></tr>';
	}

	list($default_gaining_id) = Db::record(get_label('league'), 'SELECT gaining_id FROM leagues WHERE id = ?', $league_id);
	$query = new DbQuery('SELECT id, name FROM gainings WHERE league_id IS NULL OR league_id = ? ORDER BY name', $league_id);
	echo '<tr><td>' . get_label('Gaining system') . ':</td><td><select id="form-gaining">';
	while ($row = $query->next())
	{
		list($gaining_id, $gaining_name) = $row;
		show_option($gaining_id, $default_gaining_id, $gaining_name);
	}
	echo '</select></td></tr>';
	
	echo '<tr><td>' . get_label('Notes') . ':</td><td><textarea id="form-notes" cols="80" rows="4"></textarea></td></tr>';
		
?>	

	<script>
	
	function onMinDateChange()
	{
		$('#form-end').attr("min", $('#form-start').val());
		var f = new Date($('#form-start').val());
		var t = new Date($('#form-end').val());
		if (f > t)
		{
			$('#form-end').val($('#form-start').val());
		}
	}
	
	function feeChanged()
	{
		$("#form-fee-unknown").prop('checked', 0);
	}
	
	function feeUnknownClicked()
	{
		if ($("#form-fee-unknown").attr('checked'))
		{
			$("#form-fee").val('');
		}
	}
	
	function commit(onSuccess)
	{
		var _langs = mr.getLangs('form-');
		
		var _flags = 0;
		var _end = strToDate($('#form-end').val());
		_end.setDate(_end.getDate() + 1); // inclusive
		
		var params =
		{
			op: "create",
			league_id: <?php echo $league_id; ?>,
			name: $("#form-name").val(),
			fee: ($("#form-fee-unknown").attr('checked')?-1:$("#form-fee").val()),
			currency_id: $('#form-currency').val(),
			notes: $("#form-notes").val(),
			start: $('#form-start').val(),
			gaining_id: $('#form-gaining').val(),
			end: dateToStr(_end),
			langs: _langs,
			flags: _flags
		};
		console.log(params);
		
		json.post("api/ops/series.php", params, onSuccess);
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