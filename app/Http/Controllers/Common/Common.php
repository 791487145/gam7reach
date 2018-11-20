<?php
namespace App\Http\Controllers\Common;

trait Common
{

    /**
     * 把返回的数据集转换成Tree
     * @param array $list 要转换的数据集
     * @param string $pid parent标记字段
     * @param string $level level标记字段
     * @return array
     */
    public function listToTree($list,$pk='id', $pid = 'pid', $child = '_child', $root = 0)
    {
        $tree = array();
        if(is_array($list)) {
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }

            foreach ($list as $key => $data) {
                $parentId =  $data[$pid];
                if ($root == $parentId) {
                    unset($list[$key][$pid]);
                    $tree[] =& $list[$key];
                }else{
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        unset($list[$key][$pid]);
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }

}
