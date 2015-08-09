<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  
    <header>
      <h1>
    <?php if (empty($content['field_title_override'])): ?>
      <?php echo render($content['title'][0]);?>
      <?php else: ?>
      <?php echo render($content['field_title_override'][0]); ?>
    <?php endif; ?>
</header>
<article>
      <?php echo '<h2>'.render($content['field_date_and_time_2'][0]).'</h2>';?>

      <?php if (($content['field_office_number']) or ($content['field_building'])): ?>
      <?php echo '<h3>Location:</h3> '.render($content['field_office_number'][0]).' '.render($content['field_building'][0]);?>
      <?php else: ?>
      <?php echo ''; ?>
      <?php endif; ?>

      <?php if (!empty($content['field_speaker_name']) and ($content['field_speaker_professional_title'])): ?>
      <?php echo '<h3>Speaker:</h3> '.render($content['field_speaker_name'][0]).', '.render($content['field_speaker_professional_title'][0]);?>
      <?php elseif (empty($content['field_speaker_professional_title']) and !empty($content['field_speaker_name'])): ?>
      <?php echo '<h3>Speaker:</h3> '.render($content['field_speaker_name'][0]);?>
      <?php else: ?>
      <?php echo ''; ?>
      <?php endif; ?>

      <?php echo render($content['field_speaker_company'][0]);?>

      <?php if (!empty($content['field_event_url'])): ?>
      <?php echo '<h3>Event Website:</h3> '.render($content['field_event_url'][0]);?>
      <?php else: ?>
      <?php echo ''; ?>
      <?php endif; ?>

      <?php if (($content['field_contact_name']) and ($content['field_contact_email'])): ?>
      <?php echo '<h3>For More Information, Contact:</h3> '.render($content['field_contact_name'][0]).', '.render($content['field_contact_email'][0]);?>
      <?php elseif ((empty($content['field_contact_name'])) and ($content['field_contact_email'])): ?>
      <?php echo '<h3>For More Information, Contact:</h3> '.render($content['field_contact_email'][0]);?>
      <?php elseif (($content['field_contact_name']) and (empty($content['field_contact_email']))): ?>
      <?php echo '<h3>For More Information, Contact:</h3> '.render($content['field_contact_name'][0]);?>
      <?php else: ?>
      <?php echo ''; ?>
      <?php endif; ?>

      <?php if (empty($content['field_body_override'])): ?>
      <?php echo render($content['body'][0]);?>
      <?php else: ?>
      <?php echo render($content['field_body_override'][0]); ?>
      <?php endif; ?>

      <?php if (!empty($content['field_event_type'])): ?>
      <?php echo '<h3>Keywords:</h3> '.render($content['field_event_type'][0]);?>
      <?php else: ?>
      <?php echo ''; ?>
      <?php endif; ?>

</article>

