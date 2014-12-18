<?php
function smarty_prefilter_replace_href($tpl_source, &$smarty)
{
    $ret = str_replace('href="', 'href="?url=', $tpl_source);
    return $ret;
}
