
<?php print drupal_render($form['title']); ?>

<p>Fields in grey are imported automatically from the CMU Human Resources system. To change how a person's information is displayed on this site, or if a field has no data, click "Add/Edit", type your preferred information in the "Override" box, and click Save.</p>
<p>Additional fields are available for certain Person Types. To add additional information, choose Add/Edit Person Type and select all categories that apply to that person. Additional fields will appear on this form automatically.</p>
<p>People Pages populate both the CSD Directory and the Faculty Research Guide. <b>Need help? Contact www-team@cs.cmu.edu</b></p>
<hr></hr>
<?php print render($form['field_permanently_show_or_hide_t']); ?>
<?php print render($form['field_hide_from_faculty_rearch_g']); ?>
<?php print render($form['field_photo']); ?>
<?php print render($form['field_first_name']); ?><?php print render($form['_field_readonly__field_first_name']); ?> <?php print render($form['field_override_first_name_']); ?><?php print render($form['field_first_name_override']); ?>
<div class="clear"></div>

<?php print render($form['field_last_name']); ?><?php print render($form['_field_readonly__field_last_name']); ?> <?php print render($form['field_override_last_name_']); ?><?php print render($form['field_last_name_override']); ?>
<div class="clear"></div>

<?php print render($form['field_prof_title_term']); ?><?php print render($form['_field_readonly__field_prof_title_term']); ?> <?php print render($form['field_override_professional_titl']); ?><?php print render($form['field_professional_title_overrid']); ?>
<div class="clear"></div>

<?php print render($form['field_person_type']); ?><?php print render($form['_field_readonly__field_person_type']); ?> <?php print render($form['field_override_person_type_']); ?>
<div class="clear"></div>
<?php print render($form['field_person_type_override']); ?>
<div class="clear"></div>


<?php print render($form['field_phone']); ?><?php print render($form['_field_readonly__field_phone']); ?> <?php print render($form['field_override_phone_']); ?><?php print render($form['field_phone_override']); ?>
<div class="clear"></div>

<?php print render($form['field_fax']); ?><?php print render($form['_field_readonly__field_fax']); ?> <?php print render($form['field_override_fax_']); ?><?php print render($form['field_fax_override']); ?>
<div class="clear"></div>

<?php print render($form['field_email']); ?><?php print render($form['_field_readonly__field_email']); ?> <?php print render($form['field_override_email_']); ?><?php print render($form['field_email_override']); ?>
<div class="clear"></div>

<?php print render($form['field_office_number']); ?><?php print render($form['_field_readonly__field_office_number']); ?> <?php print render($form['field_override_office_number_']); ?><?php print render($form['field_office_number_override']); ?>
<div class="clear"></div>

<?php print render($form['field_building']); ?><?php print render($form['_field_readonly__field_building']); ?> <?php print render($form['field_override_building_']); ?>
<div class="clear"></div>
<?php print render($form['field_building_override']); ?>
<div class="clear"></div>
<hr></hr>
<p>Only people with the Department designation "Computer Science Department" will appear on this site by default. <br />
To add a person to this site who doesn't appear automatically, add Computer Science Department under "Additional Departments". <br />
To display non-CSD departments on a CSD person's profile, add any other Department under "Additional Departments".</p>
<hr></hr>
<br />
<?php print render($form['field_department']); ?><?php print render($form['_field_readonly__field_department']); ?> <?php print render($form['field_add_additional_departments']); ?>
<div class="clear"></div>
<?php print render($form['field_additional_departments']); ?>
<div class="clear"></div>

<?php print render($form['field_biography']); ?>

<?php print drupal_render_children($form); ?>



