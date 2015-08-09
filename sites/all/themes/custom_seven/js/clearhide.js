(function($)
{
    jQuery(document).ready(function($)
    {

//FIRE ON PAGE LOAD JUST ONCE. IT'S NEEDED.
checkchanges();

// get reference to element containing toppings checkboxes
var el = document.getElementById('edit-field-person-type-override');

// get reference to input elements in toppings container element
var tops = el.getElementsByTagName('input');

// assign function to onclick property of each checkbox
for (var i=0, len=tops.length; i<len; i++) {
    if ( tops[i].type === 'checkbox' ) {
        tops[i].onclick = function() {
checkchanges();
};

$('#edit-field-person-type-und').change(function() {
checkchanges();
});

function checkchanges()
        {
        //SET VARS FOR OPTIONAL FORM ENTRY FIELDS.
        var $web = $('#edit-field-personal-website');
        var $advisee = $('#edit-field-advisees');
        var $adsupport = $('#edit-field-administrative-support-per');
        var $researcha = $('#edit-field-research-areas');
        var $hidedir = $('#edit-field-hide-from-directory-');
        var $pubs = $('#edit-field-selected-publications');
        var $admresp = $('#edit-field-administrative-responsibil');
        var $acadprog = $('#edit-field-academic-program');
        var $acadadv = $('#edit-field-academic-advisor');
        var $stuid = $('#edit-field-student-id');
        var $facsup = $('#edit-field-faulty-supported');

        //HIDE ALL OPTIONAL FORM ENTRY FIELDS.
        $advisee.hide();
        $adsupport.hide();
        $researcha.hide();
        $hidedir.hide();
        $pubs.hide();
        $admresp.hide();
        $acadprog.hide();
        $acadadv.hide();
        $stuid.hide();
        $facsup.hide();

        //ONLY SHOW SPECIFIC FIELDS FOR CERTAIN ROLES.
			// 1 is Faculty
			// 200 is Adjunct Faculty
			// 2728 is Affiliated Faculty
			// 2 is Staff
			// 2731 is Administrative Staff
			// 2730 is Research and Technical Staff
			// 3 is Student/Alumni
			// 2729 is Visitors

        var overrides = [];
        $.each($("input[name^=field_person_type_override]"), function(){            
          if ($(this).is(":checked")) {
			overrides.push($(this).val());
		  }
		});
        
        var $persontype = $('#edit-field-person-type-und').val();
		overrides.push($persontype);


// toggle FIELDS FOR FACULTY, ADJUNCT FACULTY, AND AFFILIATED FACULTY

			if(($.inArray('1', overrides) > -1)||($.inArray('200', overrides) > -1)||($.inArray('2728', overrides) > -1)){
             
                $advisee.toggle();
                $adsupport.toggle();
                $researcha.toggle();
                $hidedir.toggle();
                $pubs.toggle();
            }

// toggle FIELDS FOR STAFF, ADMIN STAFF, AND RESEARCH STAFF

			if(($.inArray('2', overrides) > -1)||($.inArray('2731', overrides) > -1)||($.inArray('2730', overrides) > -1)){
             	
                $admresp.toggle();
            }
            
// toggle FIELDS FOR STUDENTS AND ALUMNI

			if($.inArray('3', overrides) > -1){
             	
             	$acadprog.toggle();
		$acadadv.toggle();
		$stuid.toggle()
            }   

// toggle FIELDS FOR VISITORS

			if($.inArray('2729', overrides) > -1){
             	
                $advisee.toggle();
                $adsupport.toggle();
                $researcha.toggle();
                $hidedir.toggle();
                $pubs.toggle();
            };
}( jQuery );
        
    }
}

        //CALENDAR FIELDS
        // CALENDAR EVENT TITLE FIELD
        var $eventitlex = $(
            '#edit-field-title-override-und-0-value');
        var $titlecheckx = $('#edit-field-override-title-und');
        $eventitlex.change(function()
        {
            $(this).data('titletext', $(this).val());
        });
        // This line grabs the initial val if a manual override is done and someone clicks the checkbox.
        $eventitlex.change();
        $titlecheckx.change(function()
        {
            var $eventitlex = $(
                '#edit-field-title-override-und-0-value'
            );
            if ($(this).is(':checked'))
            {
                $eventitlex.val($eventitlex.data(
                    'titletext'));
            }
            else
            {
                $eventitlex.val("");
            }
        });
        // CALENDAR BODY FIELD
        var $eventbodyx = $('#edit-field-body-override-und-0-value');
        var $bodcheckx = $(
            '#edit-field-override-body-und.form-checkbox');
        $eventbodyx.change(function()
        {
            $(this).data('bodytext', $(this).val());
        });
        // This line grabs the initial val if a manual override is done and someone clicks the checkbox.
        $eventbodyx.change();
        $bodcheckx.change(function()
        {
            var $eventbodyx = $(
                '#edit-field-body-override-und-0-value'
            );
            if ($(this).is(':checked'))
            {
                $eventbodyx.val($eventbodyx.data('bodytext'));
            }
            else
            {
                $eventbodyx.val("");
            }
        });
        // END OF ALL FUNCTIONS. WRAP.
    });
})(jQuery);


        //CALENDAR FIELDS
        // CALENDAR EVENT TITLE FIELD
        var $eventitlex = $(
            '#edit-field-title-override-und-0-value');
        var $titlecheckx = $('#edit-field-override-title-und');
        $eventitlex.change(function()
        {
            $(this).data('titletext', $(this).val());
        });
        // This line grabs the initial val if a manual override is done and someone clicks the checkbox.
        $eventitlex.change();
        $titlecheckx.change(function()
        {
            var $eventitlex = $(
                '#edit-field-title-override-und-0-value'
            );
            if ($(this).is(':checked'))
            {
                $eventitlex.val($eventitlex.data(
                    'titletext'));
            }
            else
            {
                $eventitlex.val("");
            }
        });
        // CALENDAR BODY FIELD
        var $eventbodyx = $('#edit-field-body-override-und-0-value');
        var $bodcheckx = $(
            '#edit-field-override-body-und.form-checkbox');
        $eventbodyx.change(function()
        {
            $(this).data('bodytext', $(this).val());
        });
        // This line grabs the initial val if a manual override is done and someone clicks the checkbox.
        $eventbodyx.change();
        $bodcheckx.change(function()
        {
            var $eventbodyx = $(
                '#edit-field-body-override-und-0-value'
            );
            if ($(this).is(':checked'))
            {
                $eventbodyx.val($eventbodyx.data('bodytext'));
            }
            else
            {
                $eventbodyx.val("");
            }
        });
        // END OF ALL FUNCTIONS. WRAP.
    
(jQuery);
