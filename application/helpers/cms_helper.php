<?php
function add_meta_title($string)
{
    $CI =& get_instance();
    $CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}

function btn_edit($uri)
{
	return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>');
}

function btn_delete($uri)
{
	return anchor($uri, '<i class="glyphicon glyphicon-remove"></i>', array(
		'onclick' => "return confirm('Czy napewno chcesz usunąć element. Nie będzie można tego cofnąć. Jesteś pewien?');"
	));
}

function article_link($article){
    return 'article/' . e($article->parent_page) . '/' . intval($article->id);
}
function article_links($articles){
    $string = '<ul>';
    foreach ($articles as $article) {
        $url = article_link($article);
        $string .= '<li>';
        $string .= '<h3>' . anchor($url, e($article->title)) .  ' ›</h3>';
        $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
        $string .= '</li>';
    }
    $string .= '</ul>';
    return $string;
}

function get_excerpt($article, $numwords = 50)
{
    $string = '';
    //$url = 'article/' . intval($article->id) . '/' . e($article->slug);
    $url = 'article/' . e($article->parent_page) . '/' . intval($article->id);
    $string .='<h2>' . anchor($url, e($article->title)) . '</h2>';
    $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
    $string .= '<p>' . e(limit_to_numwords(strip_tags($article->body), $numwords)) . '</p>';
    $string .= '<p>' . anchor($url, 'Read more >', array('title' => e($article->title))) . '</p>';
    return $string;
}

function get_excerpt_page($page, $numwords = 50)
{
    $string = '';
    //$url = 'article/' . intval($article->id) . '/' . e($article->slug);
    $url = site_url() . e($page->slug);
    $string .='<h2>' . anchor($url, e($page->title)) . '</h2>';
    $string .= '<p>' . e(limit_to_numwords(strip_tags($page->body), $numwords)) . '</p>';
    $string .= '<p>' . anchor($url, 'Read more >', array('title' => e($page->title))) . '</p>';
    return $string;
}

function limit_to_numwords($string, $numwords)
{
    $excerpt = explode(' ', $string, $numwords + 1);
    if(count($excerpt) >= $numwords)
    {
        array_pop($excerpt);
    }
    $excerpt = implode(' ', $excerpt);
    return $excerpt;
}

function e($string){
    return htmlentities($string);
}

function slash_tags($item)
{
    $items = explode(',',$item);
    return $items;
}

// function get_menu ($array, $child = FALSE)
// {
//     $CI =& get_instance();
//     $str = '';
    
//     if (count($array)) {
//         $str .= $child == FALSE ? '<ul class="nav navadmin" role="tablist">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;
        
//         foreach ($array as $item) {
            
//             $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
//             if (isset($item['children']) && count($item['children'])) {
//                 $str .= $active ? '<li class="dropdown navadminli">' : '<li class="dropdown navadminli">';
//                 $str .= '<a  class="dropdown-toggle" data-toggle="dropdown" href="' . site_url(e($item['slug'])) . '">' . e($item['title']);
//                 $str .= '<b class="caret"></b></a>' . PHP_EOL;
//                 $str .= get_menu($item['children'], TRUE);
//             }
//             else {
//                 $str .= $active ? '<li class="navadminli">' : '<li class="navadminli">';
//                 $str .= '<a class="" href="' . site_url($item['slug']) . '">' . e($item['title']) . '</a>';
//             }
//             $str .= '</li>' . PHP_EOL;
//         }
//         $str .= '</ul>' . PHP_EOL;
//     }
    
//     return $str;
// }

function get_menu ($array, $child = FALSE)
{
    $CI =& get_instance();
    $str = '';
    
    if (count($array)) {
        $str .= $child == FALSE ? '<ul class="list-unstyled main-menu">' . PHP_EOL : '<ul class="list-unstyled">' . PHP_EOL;
        
        foreach ($array as $item) {
            
            if (isset($item['children']) && count($item['children'])) {
                $str .= '<li class="">';
                $str .= '<a href="' . site_url(e($item['slug'])) . '">' . e($item['title']);
                $str .= '<span class="icon"></span></a>' . PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            }
            else {
                $str .= $child == FALSE ? '<li>' : '<li class="sub-nav">';
                $str .= '<a href="' . site_url($item['slug']) . '">' . e($item['title']) . '<span class="icon"></span></a>';
            }
            $str .= '</li>' . PHP_EOL;
        }
        //strony statyczne
        $str .= '<li>';
        $str .= '<a href="' . site_url() . ' gallery ">';
        $str .= '<span class="icon"></span></a>' . PHP_EOL;
        //----------
        $str .= '</ul>' . PHP_EOL;
    }
    
    return $str;
}

function xget_menu ($array, $child = FALSE)
{
    $CI =& get_instance();
    $str = '';
    
    if (count($array)) {
        $str .= $child == FALSE ? '<ul class="nav navbar-nav menu_ul">' . PHP_EOL : '<ul class="dropdown-menu" role="menu">' . PHP_EOL;
        
        foreach ($array as $item) {
            
           // $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
            if (isset($item['children']) && count($item['children'])) {
                $str .= '<li class="dropdown">';
                $str .= '<a class="dropdown-toggle disabled" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" href="' . site_url(e($item['slug'])) . '">' . e($item['title']);
                $str .= '<b class="caret"></b></a>' . PHP_EOL;
                $str .= xget_menu($item['children'], TRUE);
            }
            else {
                $str .= '<li>';
                $str .= '<a href="' . site_url($item['slug']) . '">' . e($item['title']) . '</a>';
            }
            $str .= '</li>' . PHP_EOL;
        }
        
        $str .= '</ul>' . PHP_EOL;
    }
    
    return $str;
}



//orginal
// function get_menu ($array, $child = FALSE)
// {
//     $CI =& get_instance();
//     $str = '';
    
//     if (count($array)) {
//         $str .= $child == FALSE ? '<ul class="nav nav-tabs" role="tablist">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;
        
//         foreach ($array as $item) {
            
//             $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
//             if (isset($item['children']) && count($item['children'])) {
//                 $str .= $active ? '<li class="dropdown active">' : '<li class="dropdown">';
//                 $str .= '<a  class="dropdown-toggle" data-toggle="dropdown" href="' . site_url(e($item['slug'])) . '">' . e($item['title']);
//                 $str .= '<b class="caret"></b></a>' . PHP_EOL;
//                 $str .= get_menu($item['children'], TRUE);
//             }
//             else {
//                 $str .= $active ? '<li class="active">' : '<li>';
//                 $str .= '<a href="' . site_url($item['slug']) . '">' . e($item['title']) . '</a>';
//             }
//             $str .= '</li>' . PHP_EOL;
//         }
        
//         $str .= '</ul>' . PHP_EOL;
//     }
    
//     return $str;
// }


/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}
 
 
if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

function dateV($format,$timestamp=null){
    $to_convert = array(
        'l'=>array('dat'=>'N','str'=>array('Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela')),
        'F'=>array('dat'=>'n','str'=>array('styczeń','luty','marzec','kwiecień','maj','czerwiec','lipiec','sierpień','wrzesień','październik','listopad','grudzień')),
        'f'=>array('dat'=>'n','str'=>array('stycznia','lutego','marca','kwietnia','maja','czerwca','lipca','sierpnia','września','października','listopada','grudnia'))
    );
    if ($pieces = preg_split('#[:/.\-, ]#', $format)){  
        if ($timestamp === null) { $timestamp = time(); }
        foreach ($pieces as $datepart){
            if (array_key_exists($datepart,$to_convert)){
                $replace[] = $to_convert[$datepart]['str'][(date($to_convert[$datepart]['dat'],$timestamp)-1)];
            }else{
                $replace[] = date($datepart,$timestamp);
            }
        }
        $result = strtr($format,array_combine($pieces,$replace));
        return $result;
    }
}