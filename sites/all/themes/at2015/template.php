<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function at2015_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  at2015_preprocess_html($variables, $hook);
  at2015_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function at2015_preprocess_html(&$variables, $hook) {
drupal_add_library('system', 'ui');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function at2015_preprocess_page(&$variables, $hook) {

  $variables['sample_variable'] = t('Lorem ipsum.');
  if (isset($variables['node']->type)) {
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  }
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function at2015_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // at2015_preprocess_node_page() or at2015_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function at2015_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function at2015_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function at2015_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */


function at2015_preprocess_html(&$variables) {
drupal_add_css('https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array('group' => CSS_THEME, 'preprocess' => FALSE));
drupal_add_css('https://fonts.googleapis.com/css?family=Fira_Sans', array('group' => CSS_THEME, 'preprocess' => FALSE));
 // give colorbox its own html
  if (isset($_GET['template']) && $_GET['template'] == 'colorbox') {
    $vars['theme_hook_suggestions'][] = 'html__colorbox';
  }
}

function hook_preprocess_page(&$vars) {
drupal_add_js('https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', 'external');
  // give colorbox its own page
  if (isset($_GET['template']) && $_GET['template'] == 'colorbox') {
    $vars['theme_hook_suggestions'][] = 'page__colorbox';
  }
}

/**
* hook_form_FORM_ID_alter
*/
function at2015_form_search_block_form_alter(&$form, &$form_state, $form_id) {
    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 30;  // define size of the textfield
    //$form['search_block_form']['#default_value'] = t('Search...'); // Set a default value for the textfield
    //$form['actions']['submit']['#value'] = t('GO!'); // Change the text on the submit button
    //$form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search-button.png');

    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";

    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['search_block_form']['#attributes']['placeholder'] = t(' Search...');
}


/**
 * Theme the calendar title
 */

function at2015_date_nav_title($params) {
  $granularity = $params['granularity'];
  $view = $params['view'];
  $date_info = $view->date_info;
  $link = !empty($params['link']) ? $params['link'] : FALSE;
  $format = !empty($params['format']) ? $params['format'] : NULL;
  switch ($granularity) {
    case 'year':
      $title = $date_info->year;
      $date_arg = $date_info->year;
      break;
    case 'month':
      $format = !empty($format) ? $format : (empty($date_info->mini) ? 'F Y' : 'F Y');
      $title = date_format_date($date_info->min_date, 'custom', $format);
      $date_arg = $date_info->year .'-'. date_pad($date_info->month);
      break;
    case 'day':
      $format = !empty($format) ? $format : (empty($date_info->mini) ? 'l, F j Y' : 'l, F j');
      $title = date_format_date($date_info->min_date, 'custom', $format);
      $date_arg = $date_info->year .'-'. date_pad($date_info->month) .'-'. date_pad($date_info->day);
      break;
    case 'week':
        $format = !empty($format) ? $format : (empty($date_info->mini) ? 'F j Y' : 'F j');
      $title = t('Week of @date', array('@date' => date_format_date($date_info->min_date, 'custom', $format)));
        $date_arg = $date_info->year .'-W'. date_pad($date_info->week);
        break;
  }
  if (!empty($date_info->mini) || $link) {
      // Month navigation titles are used as links in the mini view.
    $attributes = array('title' => t('View full page month'));
      $url = date_pager_url($view, $granularity, $date_arg, TRUE);
    return l($title, $url, array('attributes' => $attributes));
  }
  else {
    return $title;
  }
}

/**
 * Implements theme_date_repeat_display().
 */
function at2015_date_repeat_display(&$vars) {
  if (isset($vars['item']['rrule'])) {

    // Let's pull out the rrule properties. For example, take this:
    //   RRULE:FREQ=DAILY;INTERVAL=1;UNTIL=20130501T035959Z;WKST=SU
    // and turn it into:
    //   array(
    //     'FREQ' => 'DAILY',
    //     'INTERVAL' => '1' ,
    //     'UNTIL' => '20130501T035959Z',
    //     'WKST' => 'SU'
    //   );
    $rrule = array();
    $rules = explode(';', str_replace('RRULE:', '', $vars['item']['rrule']));
    foreach($rules as $rule) {
      $parts = explode('=', $rule);
      $key = $parts[0];
      $value = $parts[1];
      $rrule[$key] = $value;
    }

    $additions = array();

   // add additional dates
  foreach ($additions as $addition) {
    $date2 = new dateObject($addition . ' ' . $start_date->format('H:i:s'), $timezone);
    $days[] = date_format($date, DATE_FORMAT_DATETIME);
  }

    // Now that we have our repeat rule, let's change the way it renders itself.

    // Change the 'Repeats every day until [date] .' display to our liking.
    if ($rrule['FREQ'] == 'DAILY' && $rrule['INTERVAL'] == 1) {
      $from = strtotime($vars['item']['value']);
      $to = strtotime($rrule['UNTIL']);
      $from_month = date('F', $from);
      $to_month = date('F', $to);
      $from_year = date('Y', $from);
      $to_year = date('Y', $to);
      $date = '';
      $entity  = $vars['entity'];
      $times = $entity->field_time['und'];
      $timesForDisplay = "";
      for($x = 0; $x <= sizeof($times); $x++) {
          if ($x > 0 && $x < sizeof($times)) {
              $timesForDisplay .= ", ";
          }
          $timesForDisplay .= $times[$x]['safe_value'];
      }
      if ($from_year == $to_year) {
        // Same year.
        if ($from_month == $to_month) {
          // Same month.
          $date = date('D n/j', $from) . ' - ' . date('D n/j', $to) . ' ' . $timesForDisplay;
        }
        else {
          // Different months.
          $date = date('F jS', $from) . ' - ' . date('F jS, Y', $to) . ' ' . $timesForDisplay;
        }
      } else {
            // Different year.
            $date = date('F jS, Y', $from) . ' - ' . date('F jS, Y', $to) . ' ' . $timesForDisplay;
          }
      if (isset($date2)) {
            return '<div>' . $date . ',' . $date2 .'</div>';
      } else {
         return '<div>' . $date . '</div>';
        // return theme_date_repeat_display($vars);
      }
    }

  }


  // If we made it this far, then we assume that we didn't want to theme this
  // repeat rule in a custom way, so let's just render it normally.
  return theme_date_repeat_display($vars);
}

function at2015_date_display_single($variables) {
  $date = $variables['date'];
  $timezone = $variables['timezone'];
  $attributes = $variables['attributes'];

  // Wrap the result with the attributes.
  $output = '<span class="date-display-single"' . drupal_attributes($attributes) . '>' . $date . $timezone;
  /*
  if (!empty($variables['add_microdata'])) {
    $output .= '<meta' . drupal_attributes($variables['microdata']['value']['#attributes']) . '/>';
  }
  */

  return $output;
}

function at2015_date_display_combination($variables) {
  static $repeating_ids = array();
  
  $entity_type = $variables['entity_type'];
  $entity      = $variables['entity'];
  $field       = $variables['field'];
  $instance    = $variables['instance'];
  $langcode    = $variables['langcode'];
  $item        = $variables['item'];
  $delta       = $variables['delta'];
  $display     = $variables['display'];
  $field_name  = $field['field_name'];
  $formatter   = $display['type'];
  $options     = $display['settings'];
  $dates       = $variables['dates'];
  $attributes  = $variables['attributes'];
  $rdf_mapping = $variables['rdf_mapping'];
  $add_rdf     = $variables['add_rdf'];
  $microdata   = $variables['microdata'];
  $add_microdata = $variables['add_microdata'];
  $precision   = date_granularity_precision($field['settings']['granularity']);

  $output = '';

  // If date_id is set for this field and delta doesn't match, don't display it.
  if (!empty($entity->date_id)) {
    foreach ((array) $entity->date_id as $key => $id) {
      list($module, $nid, $field_name, $item_delta, $other) = explode('.', $id . '.');
      if ($field_name == $field['field_name'] && isset($delta) && $item_delta != $delta) {
        return $output;
      }
    }
  }

  // Check the formatter settings to see if the repeat rule should be displayed.
  // Show it only with the first multiple value date.
  list($id) = entity_extract_ids($entity_type, $entity);
  if (!in_array($id, $repeating_ids) && module_exists('date_repeat_field') && !empty($item['rrule']) && $options['show_repeat_rule'] == 'show') {
    $repeat_vars = array(
      'field' => $field,
      'item' => $item,
      'entity_type' => $entity_type,
      'entity' => $entity,
    );
    $output .= theme('date_repeat_display', $repeat_vars);
    $repeating_ids[] = $id;
  }

  // If this is a full node or a pseudo node created by grouping multiple
  // values, see exactly which values are supposed to be visible.
  if (isset($entity->$field_name)) {
    $entity = date_prepare_entity($formatter, $entity_type, $entity, $field, $instance, $langcode, $item, $display);
    // Did the current value get removed by formatter settings?
    if (empty($entity->{$field_name}[$langcode][$delta])) {
      return $output;
    }
    // Adjust the $element values to match the changes.
    $element['#entity'] = $entity;
  }

  switch ($options['fromto']) {
    case 'value':
      $date1 = $dates['value']['formatted'];
      $date2 = $date1;
      break;
    case 'value2':
      $date2 = $dates['value2']['formatted'];
      $date1 = $date2;
      break;
    default:
      $date1 = $dates['value']['formatted'];
      $date2 = $dates['value2']['formatted'];
      break;
  }

  // Pull the timezone, if any, out of the formatted result and tack it back on
  // at the end, if it is in the current formatted date.
  $timezone = $dates['value']['formatted_timezone'];
  if ($timezone) {
    $timezone = ' ' . $timezone;
  }
  $date1 = str_replace($timezone, '', $date1);
  $date2 = str_replace($timezone, '', $date2);
  $time1 = preg_replace('`^([\(\[])`', '', $dates['value']['formatted_time']);
  $time1 = preg_replace('([\)\]]$)', '', $time1);
  $time2 = preg_replace('`^([\(\[])`', '', $dates['value2']['formatted_time']);
  $time2 = preg_replace('([\)\]]$)', '', $time2);

  // A date with a granularity of 'hour' has a time string that is an integer
  // value. We can't use that to replace time strings in formatted dates.
  $has_time_string = date_has_time($field['settings']['granularity']);
  if ($precision == 'hour') {
    $has_time_string = FALSE;
  }

  // No date values, display nothing.
  if (empty($date1) && empty($date2)) {
    $output .= '';
  }
  /* elseif ($date1 == $date2 && isset($entity->field_date_and_time_2['und']) && (sizeof($entity->field_date_and_time_2['und'] > 2))) {
      DebugBreak();
     
  }   */
  // Start and End dates match or there is no End date, display a complete
  // single date.
  elseif ($date1 == $date2 || empty($date2)) {
      if (sizeof($element['#entity']->field_date_and_time_2['und']) == 1) {
            $output .= theme('date_display_single', array(
              'date' => $date1,
              'timezone' => $timezone,
              'attributes' => $attributes,
              'rdf_mapping' => $rdf_mapping,
              'add_rdf' => $add_rdf,
              'microdata' => $microdata,
              'add_microdata' => $add_microdata,
              'dates' => $dates,
            ));
          

          $times = $entity->field_time['und'];
          $timesForDisplay = "";
          for($x = 0; $x <= sizeof($times); $x++) {
              if ($x > 0 && $x < sizeof($times)) {
                  $timesForDisplay .= ", ";
              }
              $timesForDisplay .= $times[$x]['safe_value'];
          }
              $output .= " " . $timesForDisplay . '</span>';
      }
  }
  // Same day, different times, don't repeat the date but show both Start and
  // End times. We can NOT do this if the replacement value is an integer
  // instead of a time string.
  elseif ($has_time_string && $dates['value']['formatted_date'] == $dates['value2']['formatted_date']) {
    // Replace the original time with the start/end time in the formatted start
    // date. Make sure that parentheses or brackets wrapping the time will be
    // retained in the final result. 
    $time = theme('date_display_range', array(
      'date1' => $time1,
      'date2' => $time2,
      'timezone' => $timezone,
      'attributes' => $attributes,
      'rdf_mapping' => $rdf_mapping,
      'add_rdf' => $add_rdf,
      'microdata' => $microdata,
      'add_microdata' => $add_microdata,
      'dates' => $dates,
    ));
    $replaced = str_replace($time1, $time, $date1);
    $output .= theme('date_display_single', array(
      'date' => $replaced,
      'timezone' => $timezone,
      'attributes' => array(),
      'rdf_mapping' => array(),
      'add_rdf' => FALSE,
      'dates' => $dates,
    ));
  }
  // Different days, display both in their entirety.
  else {
    $output .= theme('date_display_range', array(
      'date1' => $date1,
      'date2' => $date2,
      'timezone' => $timezone,
      'attributes' => $attributes,
      'rdf_mapping' => $rdf_mapping,
      'add_rdf' => $add_rdf,
      'microdata' => $microdata,
      'add_microdata' => $add_microdata,
      'dates' => $dates,
    ));
  }

  return $output;
}




