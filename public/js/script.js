//Check Sign Up Form
function check_form() {
    var username = document.getElementById("usernameText").value;
    var password = document.getElementById("passwordText").value;
    var confirm_password = document.getElementById("Confirm_passwordText").value;
    var Firstname = document.getElementById("firstNameText").value;
    var lastname = document.getElementById("lastNameText").value;
    var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$"); //Verify the email address


    if (!reg.test(username)) {
        alert("Please input the Your Email Address as username!!");
        return false;
    }
    if (password.length == 0) {
        alert("Please enter the password");
        return false;
    }
    if (password != confirm_password) {
        alert("The passwords are not match, Please enter again");
        return false;
    }
    if (Firstname.length == 0) {
        alert("Please enter the first name!");
        return false;
    }
    if (lastname.length == 0) {
        alert("Please enter the last name!");
        return false;
    }
    return true;
}


//Check Login Form
function check_Login_form() {

    var username = document.getElementById("UsernameText").value;
    var password = document.getElementById("passwordText").value;
    var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$"); //Verify the email address
    if (!reg.test(username)) {
        alert("Please input the user email address!");
        return false;
    }
    if (password.length == 0) {
        alert("Please enter the password");
        return false;
    }
    return true;
}

//Check Booking Form
function check_AddRecord_form() {
    var MatchDate = document.getElementById("MatchDateText").value;
    var Winner = document.getElementById("WinnerText").value;


    if (MatchDate.length == 0) {
        alert("Please select a Date");
        return false;
    }
    if (Winner.length == 0) {
        alert("Please enter the WinnerName");
        return false;
    }
    return true;
}

/**
 * Ajax part
 */

/**
 * Admin part - show Facility List ajax
 */
//Facility List Ajax
$(document).ready(function () {
    $(".FacilityList-btn").on('click', function (e) {
        $('#FacilityDiv').fadeIn();
        console.log("hhh");
        $.ajax({
            url: "../Web_Admin/Ajax-FacilityList.php",
            type:"post",
            success: got_Facility_data,
            dataType:"json"
        });
    })
})


//show Facilities list
function got_Facility_data(facility_data) {
    num=facility_data.length;
    output = "<tr><th>" + "Facility Name" + "</th><th>" + "Prices" + "</th></tr>";
    for (var i = 0; i < num; i++) {
        output += "<tr>"  + "<td data-label='Facility Name'>" + facility_data[i].Name + "</td>" +
            "<td data-label='Prices'>" + "£"+facility_data[i].Prices +" per hour"+
            "</td>" +"</tr >";
    }
    $('#FacilityList').html(output);
}

/**
 * Admin part - show User List ajax
 */
//User List Ajax
$(document).ready(function () {
    $(".UserList-btn").on('click', function (e) {
        $('#UserDiv').fadeIn();
        console.log("hhh");
        $.ajax({
            url: "../Web_Admin/Ajax-UserList.php",
            type:"post",
            success: got_User_data,
            dataType:"json"
        });
    })
})


//show User list
function got_User_data(User_data) {
    num=User_data.length;
    output = "<tr><th>" + "User ID" + "</th><th>" + "User email" + "</th></tr>";
    for (var i = 0; i < num; i++) {
        output += "<tr>"  + "<td data-label='User ID'>" + User_data[i].UserID + "</td>" +
            "<td data-label='User email'>" + User_data[i].Username +
            "</td>" +"</tr >";
    }
    $('#UserList').html(output);
}
