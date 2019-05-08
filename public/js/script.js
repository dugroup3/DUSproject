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

//Check Record Form
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
 * Search part
 */
//Search Button Ajax Method
$(document).ready(function () {
    $(".SearchHistory").on('click', function (e) {
        var GameName = document.getElementById("GameHistorySearch").value;
        console.log(GameName);
        $.ajax({
            url: "../Web_Basic_User/Ajax-SearchHistory.php",
            type: 'post',
            data: {'GameName': GameName},
            success: got_game_data,
            fail: not_got_game_data,
            dataType: "json"

        });
    })
})

//success Method
function got_game_data(game_data) {
    num = game_data.length;
    numOfResult = "<p class='PDanger'>" + "The number of Search Result is " + num + "</p>";
    output = "<tr><th>" + "Match ID" + "</th><th>" + "User Name" + "</th><th>" + "Game Name" + "</th><th>" + "Match Date" + "</th><th>" + "Status" + "</th></tr>";
    $('#MatchHistory').fadeOut();
    for (var i = 0; i < num; i++) {
        if (game_data[i].WinnerID != game_data[i].UserID) {
            status = "Lost";
        } else {
            status = "Won";
        }
        output += "<tr>" + "<td data-label='MatchID'> " + game_data[i].MatchID + "</td>" + "<td data-label='UserName'>" + game_data[i].userName + "</td>" + "<td data-label='Game Name'>" + game_data[i].Name +
            "</td>" + "<td data-label='Date'>" + game_data[i].MatchDate + "</td>" + "<td data-label='Status'>" + status + "" + "</tr >";
    }
    $('#SearchResult').html(output);
    $('#NumOfResult').html(numOfResult);
}

//Fail method
function not_got_game_data() {

}

/**
 * Ajax- Search part by day
 */
//Search day Button Ajax Method
$(document).ready(function () {
    $(".Match-Search-btn").on('click', function (e) {
        $.ajax({
            url: "../Web_Basic_User/Ajax-SearchHistoryByday.php",
            type: 'post',
            success: got_match_data,
            data:$("#Match-Search-form").serialize(),
            dataType: "json"

        });
    })
})

function got_match_data(game_data){
    num = game_data.length;
    numOfResult = "<p class='PDanger'>" + "The number of Search Result is " + num + "</p>";
    output = "<tr><th>" + "Match ID" + "</th><th>" + "Game Name" + "</th><th>" + "Match Date" + "</th><th>" + "Status" + "</th></tr>";
    $('#MatchHistory').fadeOut();
    for (var i = 0; i < num; i++) {
        if (game_data[i].WinnerID != game_data[i].UserID) {
            status = "Lost";
        } else {
            status = "Won";
        }
        output += "<tr>" + "<td data-label='MatchID'> " + game_data[i].MatchID + "</td>" + "<td data-label='Game Name'>" + game_data[i].Name +
            "</td>" + "<td data-label='Date'>" + game_data[i].MatchDate + "</td>" + "<td data-label='Status'>" + status + "" + "</tr >";
    }
    $('#SearchResult').html(output);
    $('#NumOfResult').html(numOfResult);
}

/**
 * Ajax-show match detail button method
 */
function showMatchDetail(MatchID){
    var xmlhttp;
    if (MatchID.length==0)
    {
        document.getElementById("MatchHistory").innerHTML="";
        return;
    }
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("MatchHistory").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","../Web_Basic_User/Ajax-ShowMatchDetail.php?MatchID="+MatchID,true);
    xmlhttp.send();
}

/**
 * Allow member add record method
 */
//Add participate input box
$(document).ready(function () {

    var MaxInputs = 2; //maximum input boxes allowed
    var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
    var AddButton = $("#AddMoreFileBox"); //Add button ID

    var x = InputsWrapper.length; //initlal text box count
    var FieldCount = 1; //to keep track of text box added

    $(AddButton).click(function (e)  //on add input button click
    {
        if (x <= MaxInputs) //max input box allowed
        {
            FieldCount++; //text box added increment
            //add input box
            $(InputsWrapper).append('<div><input style="margin-top: 20px" type="text" class="form-control" name="PlayerName' + FieldCount + '" id="OtherPlayerText' + FieldCount + '" value="" placeholder="OtherPlayer (Optional) ' + FieldCount + '"/></div>');
            x++; //text box increment
        }
        return false;
    });

});

/**
 *  Ajax -Add record method
 */
//add Record function
$(document).ready(function () {
    $(".add-Record").on('submit', function (e) {
        e.preventDefault();
        //the button got clicked
        console.log("hhh");

        $.ajax({
            url: "../Web_Basic_User/Ajax-AddRecordForm.php",
            type: 'post',
            data: $(".add-Record").serialize(),
            success: send_the_message,
            fail: not_got_record_data,

        });
    });
});

//Add Record Success method
function send_the_message(msg) {
    alert(msg);
}

//can not got the record data method
function not_got_record_data() {

}

/**
 * Search Game Ajax
 */
//Search Game Info By Game ID (Using API)
$(document).ready(function () {
    $("#SearchID").on('click', function (e) {
        e.preventDefault();
        //the button got clicked
        var GameID = document.getElementById("SearchGameID").value
        if (GameID == null) {
            stop();
        } else {
            $.ajax({
                url: "https://bgg-json.azurewebsites.net/thing/" + GameID,
                type: 'get',
                dataType: 'json',
                success: receive_the_GameInfo,
                fail: not_receive_the_GameInfo,
            });
        }
    });

});

//Receive the Game Info
function receive_the_GameInfo(GameInfo_data) {
    var GameID = GameInfo_data.gameId;
    var GameName = GameInfo_data.name;
    var thumbnail = GameInfo_data.thumbnail;
    if (GameID != null && GameName != null && thumbnail != null) {
        str = '<p class="PDanger"> GameID:  <span style="color: white">' + GameID + '</span></p><p class="PDanger"> Game Name: ' +
            ' <span style="color: white">' + GameName + '</span></p>' +
            '<p class="PDanger"> thumbnail:  <span style="color: white">' + thumbnail + '</span></p>';
        $("#GameInfo").html(str)
    } else {
        msg = "This Game not Exsit";
        $("#GameInfo").html(msg);
    }
}

//Can not receive game info
function not_receive_the_GameInfo() {
    var msg = "Can not receive This Game Info";
    str = '<p>' + msg + '</p>';
    $("#GameInfo").html(str)
}



/**
 * Admin part - Add Game ajax
 */
//add Game function
$(document).ready(function () {
    $("#add-game").on('click', function (e) {
        e.preventDefault();
        //the button got clicked
        //console.log("hhh");

        $.ajax({
            url: "../Web_Admin/Ajax-addGame.php",
            type: 'post',
            data: $("#add-game-form").serialize(),
            success: got_addgame_data,

        });
    });
});

//success got the add game data
function got_addgame_data(msg) {
    alert(msg);
}

/**
 * Admin part - edit Game ajax
 */
//Edit Game functionn
$(document).ready(function () {
    $("#edit-game").on('click', function (e) {
        e.preventDefault();
        //the button got clicked
        console.log("hhh");

        $.ajax({
            url: "../Web_Admin/Ajax-editGame.php",
            type: 'post',
            data: $("#edit-game-form").serialize(),
            success: got_editgame_data,

        });
    });
});


//success got the editgame info
function got_editgame_data(msg) {
    alert(msg);
}

/**
 * Admin part - show User List ajax
 */
//UserList Ajax
$(document).ready(function () {
    $(".UserList-btn").on('click', function (e) {
        $('#UserDiv').fadeIn();
        $('#MatchDiv').fadeOut();
        console.log("haha");
        $.ajax({
            url: "../Web_Admin/Ajax-UserList.php",
            type:"post",
            success: got_User_data,
            dataType:"json"
        });
    })
})

//show user list
function got_User_data(user_data) {
    num=user_data.length;
    output = "<tr><th>" + "User ID" + "</th><th>" + "First Name" + "</th><th>" + "Last Name" + "</th><th>" + "User Name" + "</th></tr>";
    $('#MatchHistory').fadeOut();
    for (var i = 0; i < num; i++) {
        output += "<tr>" + "<td data-label='User ID'> " + user_data[i].UserID + "</td>" + "<td data-label='First Name'>" + user_data[i].firstName + "</td>" + "<td data-label='Last Name'>" + user_data[i].lastName +
            "</td>" + "<td data-label='User Name'>" + user_data[i].userName + "</td>"+"</tr >";
    }
    $('#UserList').html(output);
}

/**
 * Admin part - show Match List Button onclick method
 */
//Match List Btn Method
$(document).ready(function () {
    $(".MatchList-btn").on('click',function (e) {
        $('#MatchDiv').fadeIn();
        $('#UserDiv').fadeOut();

    })
})


/**
 * Admin part - show add people form
 */
//Add People Btn Method
$(document).ready(function () {
    $(".add-peopelbtn").on('click',function (e) {
        $('#add-peopleDiv').fadeIn();
    })
})

/**
 * Admin-part User Sta
 */
//Show Button method
function showNumOfPlay(userID) {
    $('#NumOfPlay-table').fadeIn();
    var xmlhttp;
    if (userID.length==0)
    {
        document.getElementById("NumOfPlay").innerHTML="";
        return;
    }
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("NumOfPlay").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","../Web_Admin/Ajax-ShowNumOfPlay.php?userID="+userID,true);
    xmlhttp.send();
}

/**
 * Admin-part Game Leader Board Search Button
 */
//Game Leader board List Ajax
$(document).ready(function () {
    $(".Search-btn").on('click', function (e) {
        $.ajax({
            url: "../Web_Admin/Ajax-filterGame.php",
            type:"post",
            data:$("#Search-form").serialize(),
            success: got_game_leader_data,
        });
    })
})

function got_game_leader_data(game_data) {
    output=game_data;
    $('#GameLB').html(output);
}

/**
 * Admin-part User Leader Board Search Button
 */
//Game Leader board List Ajax
$(document).ready(function () {
    $(".User_Search-btn").on('click', function (e) {
        $.ajax({
            url: "../Web_Admin/Ajax-filterUser.php",
            type:"post",
            data:$("#User_Search-form").serialize(),
            success: got_user_leader_data,
        });
    })
})

function got_user_leader_data(user_data) {
    output=user_data;
    $('#UserLB').html(output);
}




