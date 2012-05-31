<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=page.tags
[END_COT_EXT]
==================== */

defined('COT_CODE') or die('Wrong URL');

$sort = 'page_'.$cfg['page'][$pag['page_cat']]['order'];
$way = $cfg['page'][$pag['page_cat']]['way'];

$currentkey = -1;
$siblings = $db->query("SELECT * FROM $db_pages WHERE page_cat = ? ORDER BY $sort $way", array($pag['page_cat']))->fetchAll();
foreach ($siblings as $key => $data)
{
	$iscurrent = ($data['page_id'] == $id);
	$currentkey = ($iscurrent) ? $key : $currentkey;
	$t->assign('PAGE_SIBLING_NUM', $key+1);
	$t->assign('PAGE_SIBLING_ODDEVEN', cot_build_oddeven($key+1));
	$t->assign('PAGE_SIBLING_ISCURRENT', $iscurrent);
	$t->assign(cot_generate_pagetags($data, 'PAGE_SIBLING_', 0, $usr['isadmin']));
	$t->parse('MAIN.SIBLINGS.SIBLING');
}
$t->parse('MAIN.SIBLINGS');

if ($currentkey >= 0)
{
	if ($siblings[$currentkey-1])
	{
		$t->assign(cot_generate_pagetags($siblings[$currentkey-1], 'PAGE_PREVSIBLING_', 0, $usr['isadmin']));
		$t->parse('MAIN.PREVSIBLING');
	}
	if ($siblings[$currentkey+1])
	{
		$t->assign(cot_generate_pagetags($siblings[$currentkey+1], 'PAGE_NEXTSIBLING_', 0, $usr['isadmin']));
		$t->parse('MAIN.NEXTSIBLING');
	}
}

?>