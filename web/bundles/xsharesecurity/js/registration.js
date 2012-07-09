$(function() {
    //set datepicker for the birthdate input
    $( "#datepicker" ).datepicker({
        showOn: "button",
        buttonImage: "/images/calendar.gif",
        buttonImageOnly: true,
        changeMonth: true,
        changeYear: true,
        maxDate: new Date(),
        minDate: new Date(-90, 1 -1, 1),
        yearRange: "-90:nn",
        dateFormat: "dd/mm/yy"
    });
});


