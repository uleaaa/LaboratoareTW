$(document).ready(function() {
    $("#education_btn").click(function() {
      $(".edu-form").toggle();
    });
    $("#job_btn").click(function() {
        $(".job-div").toggle();
      });
    $("#social_btn").click(function() {
        $(".social-form").toggle();
      });
});

$(document).ready(function() {
    var wrapper         = $(".input_fields_wrap"); 
    var add_button      = $(".add_field_button"); 
   
    var x = 1; 
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < 10){ 
            x++; 
            $(wrapper).append('<div><input type="text" name="social-links"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

$(function() {
    $("#firstname_error_message").hide();
    $("#lastname_error_message").hide();
    $("#email_error_message").hide();
    $("#phone_error_message").hide();
    $("#city_error_message").hide();
    $("#profession_error_message").hide();
    $("#etitle_error_message").hide();

    var error_firstname = false;
    var error_lastname = false;
    var error_email = false;
    var error_phone = false;
    var error_city = false;
    var error_profession = false;
    var error_etitle = false;

    $("#form_firstname").focusout(function(){
        check_firstname();
    });
    $("#form_lastname").focusout(function(){
        check_lastname();
    });
    $("#form_email").focusout(function(){
        check_email();
    });
    $("#form_phone").focusout(function(){
        check_phone();
    });
    $("#form_city").focusout(function(){
        check_city();
    });
    $("#form_profession").focusout(function(){
        check_profession();
    });
    $("#form_etitle").focusout(function(){
        check_etitle();
    });

    function check_firstname(){
        var firstname = $("#form_firstname").val()
        if (pattern.test(firstname) && firstname!= '') {
            $("#firstname_error_message").hide();
            $("#form_firstname").css("border", "2px solid #000000");
        } else {
            $("#firstname_error_message").html("Required field");
            $("#firstname_error_message").show();
            $("#form_firstname").css("border", "2px solid #F90A0A");
            error_firstname = true;
        }
    }
    function check_lastname(){
        var lastname = $("#form_lastname").val()
        if (pattern.test(lastname) && lastname!= '') {
            $("#lastname_error_message").hide();
            $("#form_lastname").css("border", "2px solid #000000");
        } else {
            $("#lastname_error_message").html("Required field");
            $("#lastname_error_message").show();
            $("#form_lastname").css("border", "2px solid #F90A0A");
            error_lastname = true;
        }
    }
    function check_email(){
        var email = $("#form_email").val()
        if (pattern.test(email) && email!= '') {
            $("#email_error_message").hide();
            $("#form_email").css("border", "2px solid #000000");
        } else {
            $("#email_error_message").html("Invalid email");
            $("#email_error_message").show();
            $("#form_email").css("border", "2px solid #F90A0A");
            error_email = true;
        }
    }
    function check_phone(){
        var phone = $("#form_phone").val()
        if (pattern.test(phone) && phone!= '') {
            $("#phone_error_message").hide();
            $("#form_phone").css("border", "2px solid #000000");
        } else {
            $("#phone_error_message").html("Invalid number");
            $("#phone_error_message").show();
            $("#form_phone").css("border", "2px solid #F90A0A");
            error_phone = true;
        }
    }
    function check_city(){
        var city = $("#form_city").val()
        if (pattern.test(city) && city!= '') {
            $("#city_error_message").hide();
            $("#form_city").css("border", "2px solid #000000");
        } else {
            $("#city_error_message").html("Required field");
            $("#city_error_message").show();
            $("#form_city").css("border", "2px solid #F90A0A");
            error_city = true;
        }
    }
    function check_profession(){
        var profession = $("#form_profession").val();
        if (pattern.test(profession) && profession!= '') {
            $("#profession_error_message").hide();
            $("#form_profession").css("border", "2px solid #000000");
        } else {
            $("#profession_error_message").html("Required field");
            $("#profession_error_message").show();
            $("#form_profession").css("border", "2px solid #F90A0A");
            error_profession = true;
        }
    }
});
function loadProfessions() {
    console.log('loading professions');
    $.ajax({
        url: 'http://localhost:3000/professions/10',
        method: 'GET',
        datatype: 'json',
        headers: {
            'Content-Type': 'application/json',
        },
        success: function (response) {
            response.forEach(profession => {
                $("#form_profession").append(buildOption(profession.label, profession.label));
            });
            console.log(response);
        },
    });
}

document.getElementById('form-etitle').addEventListener('focusout', function () {
    let educationHasValue = validateEducation("form-etitle" , "Education title is required")

    if (educationHasValue) {
        educationHasValue = validateEducation();
    }

        const allFieldsValid = educationHasValue;
        if(allFieldsValid) {
            showValues();
        } else {
            hideValues();
        }
});

function showValues(){
    ['form-etitle'].forEach(id =>{
        const valueElement = document.getElementById(`${id}Display`);
        valueElement.innerHTML = `${id}: ${emelent.value};`;
    });
}

function hideValues() {
    ['form-etitle'].forEach(id =>{
        const valueElement = document.getElementById(`${id}Display`);
        valueElement.innerHTML = null;
    });
}

 //send 
  $("#idForm").submit(function(e) {
   
    e.preventDefault();

    var form = $(this);
    var url = form.attr('action');
    var userInputs = {};
    form.serializeArray().forEach((input) => {userInputs[input.name] = input.value;})
    console.log(userInputs);
    $.ajax({
      url,
      method: 'POST',
      datatype: 'json',
      headers: {'Content-Type': 'application/json'},
      data: JSON.stringify(userInputs),
      success: function(response) {
        console.log(response);
      }
    });
  });