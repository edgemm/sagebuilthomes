<h2 style="font-family:georgia;font-size:13px;color:black;font-weight:bold;">SEARCH CITIES</h2>
		<div id="cityline"></div>

<?php 
//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

$taxonomy     = 'homes_community';
$orderby      = 'name'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title
);
?>

<ul id="neighborhoods">
<?php wp_list_categories( $args ); ?>
</ul>