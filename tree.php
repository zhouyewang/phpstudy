<?php
/**
 * Created by PhpStorm.
 * User: zyw
 * Date: 2017/3/11
 * Time: 16:28
 */
/**
 * 数据结构
id	fid	title
1	0	中国
2	1	江苏
3	1	安徽
4	8	江阴
5	3	芜湖
6	3	合肥
7	3	蚌埠
8	2	无锡
 */
$list = array(
    array('id'=>1, 'fid'=>0, 'title' => '中国'),
    array('id'=>2, 'fid'=>1, 'title' => '江苏'),
    array('id'=>3, 'fid'=>1, 'title' => '安徽'),
    array('id'=>4, 'fid'=>8, 'title' => '江阴'),
    array('id'=>5, 'fid'=>3, 'title' => '芜湖'),
    array('id'=>6, 'fid'=>3, 'title' => '合肥'),
    array('id'=>7, 'fid'=>3, 'title' => '蚌埠'),
    array('id'=>8, 'fid'=>8, 'title' => '无锡')
);
foreach( array_keys( $list ) as $key )
{
    if( $list[$key]['fid'] == 0 )
    {
        continue;
    }
    if( putChild( $list , $list[$key] ) )
    {
        unset( $list[$key] );
    }
}
function putChild( &$list , $tree )
{
    if( empty( $list ) )
    {
        return false;
    }
    foreach( $list as $key => $val )
    {
        if( $tree['fid'] == $val['id'] && $tree['id'] != $tree['fid'] )
        {
            $list[$key]['child'][] = $tree;
            return true;
        }
        if( isset( $val['child'] ) && is_array( $val['child'] ) && !empty( $val['child'] ) )
        {
            if( putChild( $list[$key]['child'] , $tree ) )
            {
                return true;
            }
        }
    }
    return false;
}
function get_tree_ul($data, $fid) {
    $stack = array($fid);
    $child = array();
    $added_left = array();
    $added_right= array();
    $html_left     = array();
    $html_right    = array();
    $obj = array();
    $loop = 0;
    foreach($data as $node) {
        $pid = $node['fid'];
        if(!isset($child[$pid])) {
            $child[$pid] = array();
        }
        array_push($child[$pid], $node['id']);
        $obj[$node['id']] = $node;
    }

    while (count($stack) > 0) {
        $id = $stack[0];
        $flag = false;
        $node = isset($obj[$id]) ? $obj[$id] : null;
        if (isset($child[$id])) {
            $cids = $child[$id];
            $length = count($cids);
            for($i = $length - 1; $i >= 0; $i--) {
                array_unshift($stack, $cids[$i]);
            }
            $obj[$cids[$length - 1]]['isLastChild'] = true;
            $obj[$cids[0]]['isFirstChild'] = true;
            $flag = true;
        }
        if ($id != $fid && $node && !isset($added_left[$id])) {
            if(isset($node['isFirstChild']) && isset($node['isLastChild']))  {
                $html_left[] = '<li class="first-child last-child">';
            } else if(isset($node['isFirstChild'])) {
                $html_left[] = '<li class="first-child">';
            } else if(isset($node['isLastChild'])) {
                $html_left[] = '<li class="last-child">';
            } else {
                $html_left[] = '<li>';
            }
            $html_left[] = ($flag === true) ? "<div>{$node['title']}</div><ul>" : "<div>{$node['title']}</div>";
            $added_left[$id] = true;
        }
        if ($id != $fid && $node && !isset($added_right[$id])) {
            $html_right[] = ($flag === true) ? '</ul></li>' : '</li>';
            $added_right[$id] = true;
        }

        if ($flag == false) {
            if($node) {
                $cids = $child[$node['fid']];
                for ($i = count($cids) - 1; $i >= 0; $i--) {
                    if ($cids[$i] == $id) {
                        array_splice($child[$node['fid']], $i, 1);
                        break;
                    }
                }
                if(count($child[$node['fid']]) == 0) {
                    $child[$node['fid']] = null;
                }
            }
            array_push($html_left, array_pop($html_right));
            array_shift($stack);
        }
        $loop++;
        if($loop > 5000) return $html_left;
    }
    unset($child);
    unset($obj);
    return implode('', $html_left);
}

echo "<pre>";
print_r( $list );