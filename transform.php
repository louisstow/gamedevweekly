<?php
$data = file_get_contents("weekly.txt");

$sections = explode("\n\n", $data);
$hash = array();

foreach ($sections as $key=>$val) {
	$parts = explode("\n", $val);
	//print_r($parts);

	$header = $parts[0];
	preg_match("/([^\[]+) \[([a-zA-Z]+)\]/", $header, $matches);
	
	if (count($matches)) {
		$parts[0] = $matches[1];
		$hash[$matches[2]][] = $parts;
	}
}

ob_start();
?>

<? foreach ($hash['top'] as $link) { ?>

<table style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td style="padding: 0 0 5px 0;">
			<a style="color: #0972d3; font-weight: 400; line-height: 28px; font-size: 22px; text-decoration: none; font-family: sans-serif" href="<?=$link[1]?>">
			<?=$link[0]?></a>
		</td>
	</tr>
	<tr>
		<td style="font-family: sans-serif; color: #5c5c5c; line-height: 20px; font-size: 16px; padding-bottom: 20px; padding-top: 0;">
		<? if (isset($link[3]) && strlen($link[3])) { ?>
			<img src="http://gamedevedition.com/thumb/<?=$link[3]?>" style="float: right; margin: 0 0 5px 5px" />
		<? } ?>
		<?=$link[2]?>
		</td>
	</tr>
</table>

<? } ?>
<? unset($hash['top']); ?>

<table style="width:100%!important; min-width:100%; max-width:100%; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td style="padding-top: 15px">
<table style="width:100%!important; min-width:100%; max-width:100%; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td style="font-size:1px; line-height:1px; border-top: 2px solid #8420b3; padding-bottom: 15px;">&nbsp;</td></tr></table>
</td></tr></table>

<?
$total = count($hash);
$i = 0;
?>
<? foreach ($hash as $name=>$section) { ?>

<table style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td style="padding: 0 0 20px 0;">
<span style="text-transform: uppercase; text-decoration: none; font-weight: 700; font-family: sans-serif; color: #8420b3; font-size: 17px;"><?=$name?></span>
</td></tr></table>

<? foreach ($section as $link) { ?>

<table style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td style="padding: 0 0 5px 0;">
			<a style="color: #0972d3; font-weight: 800; line-height: 18px; font-size: 16px; text-decoration: none; font-family: sans-serif" href="<?=$link[1]?>">
			<?=$link[0]?></a>
		</td>
	</tr>

	<tr>
		<td style="font-family: sans-serif; color: #5c5c5c; line-height: 20px; font-size: 16px; padding-bottom: 20px; padding-top: 0;">
		<? if (isset($link[3]) && strlen($link[3])) { ?>
			<img src="http://gamedevedition.com/thumb/<?=$link[3]?>" style="float: right; margin: 0 0 5px 5px" />
		<? } ?>

		<? if (isset($link[2]) && strlen($link[2])) { ?>
			<?=$link[2]?>
		<? } ?>
		</td>
	</tr>
</table>

<? } ?>

<? $i++; ?>
<? if ($i < $total) { ?>
<table style="width:100%!important; min-width:100%; max-width:100%; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td style="padding-top: 15px">
<table style="width:100%!important; min-width:100%; max-width:100%; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td style="font-size:1px; line-height:1px; border-top: 2px solid #8420b3; padding-bottom: 15px;">&nbsp;</td></tr></table>
</td></tr></table>
<? } ?>

<? } ?>

<?
echo ob_get_clean();
?>