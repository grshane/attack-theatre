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
      <p><a href="javascript:history.back(1)">&laquo; Back</a></p>
      <div class="contact_info">
    <?php echo render($content['field_photo']); ?>
        
    <?php if (!empty($content['field_computed_office']) and ($content['field_computed_building'])): ?>
      <?php echo '<p><span class="label">Office:</span>&nbsp;'.render($content['field_computed_office'][0]).'&nbsp;'.render($content['field_computed_building'][0]).'</p>';?>
      <?php elseif (empty($content['field_office_number'])) : ?>
      <?php echo '<p><span class="label">Office:</span>&nbsp;'.render($content['field_computed_building'][0]).'</p>';?>
      <?php else: ?>
      <?php echo ''; ?>
    <?php endif; ?>

    <?php if (!empty($content['field_computed_email'])): ?>
      <?php echo '<p><span class="label">Email:</span>&nbsp;'.render($content['field_computed_email'][0]).'</p>';?>
      <?php else: ?>
      <?php echo ''; ?>
    <?php endif; ?>

    <?php if (!empty($content['field_computed_phone'])): ?>
      <?php echo '<p><span class="label">Phone:</span>&nbsp;'.render($content['field_computed_phone'][0]).'</p>';?>
      <?php else: ?>
      <?php echo ''; ?>
    <?php endif; ?>

    <?php if (!empty($content['field_computed_fax'])): ?>
      <?php echo '<p><span class="label">Fax:</span>&nbsp;'.render($content['field_computed_fax'][0]).'</p>';?>
      <?php else: ?>
      <?php echo ''; ?>
    <?php endif; ?>

    <?php if (empty($content['field_department'])): ?>
      <?php echo '';?>
      <?php else: ?>
      <?php echo '<p><span class="label">Department(s):</span><br />'. render($content['field_department'][0]) .'<br />'. render($content['field_additional_departments'][0]).'</p>'; ?>
    <?php endif; ?>

    <?php if (empty($content['field_personal_website'])): ?>
      <?php echo '';?>
      <?php else: ?>
      <?php echo '<p><a href="'. $url = $node->field_personal_website[$node->language][0]['url'].'">Personal Website</a></p>'; ?>
    <?php endif; ?>
  </div> 
  <div class="bio">    
    <header>
      <h1>
    <?php echo render($content['field_computed_first_name'][0]).'&nbsp'.render($content['field_computed_last_name'][0]); ?>
    
    </h1>
    <h2>
    <?php echo render($content['field_computed_prof_title']); ?>
    </h2>
    
    <?php if (empty($content['field_administrative_support_per'])): ?>
      <?php echo '';?>
      <?php else: ?>
      <?php echo '<span class="label">Administrative Support Person:</span> '.render($content['field_administrative_support_per']); ?>
    <?php endif; ?>

  <?php if (!empty($content['field_administrative_support_per']) and ($content['field_research_areas'])) : ?>
      <?php echo '<br>';?>
      <?php else: ?>
      <?php echo ''; ?>
    <?php endif; ?>
      
  <?php if (!empty($content['field_research_areas'])): ?>
      <?php echo '<span class="label">Research Interests:</span> '.render($content['field_research_areas']);?>
      <?php else: ?>
      <?php echo ''; ?>
    <?php endif; ?>

  <?php if (!empty($content['field_biography'])): ?>
      <?php echo render($content['field_biography']);?>
      <?php else: ?>
      <?php echo ''; ?>
    <?php endif; ?>



     <?php if (empty($content['field_academic_advisor'])): ?>
      <?php echo '';?>
      <?php else: ?>
      <?php echo '<span class="label">Academic Advisor:</span> '.render($content['field_academic_advisor']).'<br />'; ?>
    <?php endif; ?>


    <?php if (empty($content['field_advisees'])): ?>
      <?php echo '';?>
      <?php else: ?>
      <?php echo '<span class="fa fa-chevron-right fieldset-icons"></span><fieldset class="collapsible collapsed"><legend><span class="fieldset-legend">Advisees</span></legend><div class="fieldset-wrapper">'.render($content['field_advisees']).'</div></fieldset>'; ?>
    <?php endif; ?>

 <?php if (empty($content['field_selected_publications'])): ?>
      <?php echo '';?>
      <?php else: ?>   
      <?php echo '<br /><span class="fa fa-chevron-right fieldset-icons"></span><fieldset class="collapsible collapsed"><legend><span class="fieldset-legend">Selected Publications</span></legend><div class="fieldset-wrapper">'.render($content['field_selected_publications']).'</div></fieldset>'; ?>
     <?php endif; ?>  
  
    <?php if (empty($content['field_faulty_supported'])): ?>
      <?php echo '';?>
      <?php else: ?>
      <?php echo '<br />'.render($content['field_faulty_supported']); ?>
    <?php endif; ?>
   
    <?php if (empty($content['field_administrative_responsibil'])): ?>
      <?php echo '';?>
      <?php else: ?>
      <?php echo '<br />'.render($content['field_administrative_responsibil']);?>
    <?php endif; ?>

    <?php if (empty($content['field_academic_program'])): ?>
      <?php echo '';?>
      <?php else: ?>
      <?php echo render($content['field_academic_program']); ?>
    <?php endif; ?>

      <?php if ($unpublished): ?>
        <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
      <?php endif; ?>
    </header>
 </div>
  
    
        
</article>

