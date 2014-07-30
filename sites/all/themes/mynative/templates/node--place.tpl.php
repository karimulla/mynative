<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */

global $theme_path;
$theme_path = '/sites/all/themes/mynative/';
drupal_add_css($theme_path . '/css/place.css', 'file');

?>

<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

    </header>
  <?php endif; ?>

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    print render($content);
    
  ?>
  <?php 
   $HTML = "";
   if(!$is_front && isset($node->field_longitude['und'][0]['value']) && isset($node->field_latitude['und'][0]['value'])) {
    $HTML = '<img src="http://maps.googleapis.com/maps/api/staticmap?center=' . $node->field_latitude['und'][0]['value'] . ',' . $node->field_longitude['und'][0]['value'] . '&zoom=12&size=300x300"/><br/>';
   }
  ?>
  <?php print $HTML;?>
  <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

      <?php if ($unpublished): ?>
        <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
      <?php endif; ?>
  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article>
