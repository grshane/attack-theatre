

<?php echo '<span class="fa fa-chevron-right fieldset-icons"></span><fieldset class="collapsible collapsed">
<legend><span class="fieldset-legend"><span class="event-date">'.$fields['field_date_and_time_2']->content.'</span>
<span class="event-title">'.$fields['views_conditional']->content.'</span>'; ?>
               <?php echo render($fields['field_speaker_name']->wrapper_prefix); ?><?php echo render($fields['field_speaker_name']->content); ?><?php echo render($fields['field_speaker_name']->wrapper_suffix); ?>
               <?php echo render($fields['field_speaker_company']->wrapper_prefix); ?> <?php echo render($fields['field_speaker_company']->content); ?> <?php echo render($fields['field_speaker_company']->wrapper_suffix); ?>         
               <?php echo '<span class="event-building">'.$fields['field_building']->content.'</span></span></legend><div class="fieldset-wrapper">';?>
               <?php echo render($fields['views_conditional_1']->wrapper_prefix); ?><?php echo render($fields['views_conditional_1']->content); ?><?php echo render($fields['views_conditional_1']->wrapper_suffix); ?>         

               <?php echo '<h3>Details:</h3>'; ?>


               <?php echo render($fields['field_contact_name']->wrapper_prefix); ?><?php echo render($fields['field_contact_name']->content); ?><?php echo render($fields['field_contact_name']->wrapper_suffix); ?>         
               <?php echo render($fields['field_contact_email']->wrapper_prefix); ?><?php echo render($fields['field_contact_email']->content); ?><?php echo render($fields['field_contact_email']->wrapper_suffix); ?>         
               <?php echo render($fields['field_event_url']->wrapper_prefix); ?><?php echo render($fields['field_event_url']->content); ?><?php echo render($fields['field_event_url']->wrapper_suffix); ?>         
               <?php echo render($fields['field_event_type']->wrapper_prefix); ?><?php echo render($fields['field_event_type']->content); ?><?php echo render($fields['field_event_type']->wrapper_suffix); ?>         

     	<?php echo '</div></fieldset><hr></hr>';?>