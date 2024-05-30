<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP with AJAX</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #data-table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }
        #data-table, #data-table th, #data-table td {
            border: 1px solid #ddd;
        }
        #data-table th, #data-table td {
            padding: 10px;
            text-align: left;
        }
        #data-table th {
            background-color: #f2f2f2;
        }
        .input-container {
            margin-top: 20px;
        }
        .input-container input {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: calc(100% - 22px); /* Adjust width to include padding and border */
        }
        .input-container button {
            margin-top: 10px;
        }
        .delete-btn {
            background: red;
            color: white;
            border: 0;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: darkred;
        }
        .update-btn {
            background: green;
            color: white;
            border: 0;
            cursor: pointer;
        }
        .update-btn:hover {
            background-color: darkgreen;
        }
        #modal {
            background: rgba(0,0,0,0.7);
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            display: none;
        }
        #modal-form {
            background: #fff;
            width: 30%;
            position: relative;
            top: 20%;
            left: calc(50% - 15%);
            padding: 15px;
            border-radius: 4px;
        }
        #modal-form h2 {
            margin: 0 0 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #000;
        }
        #modal-form input[type="text"] {
            width: 100%;
        }
        #close-btn {
            background: red;
            color: white;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            position: absolute;
            top: -15px;
            right: -15px;
            cursor: pointer;
        }
        .search-container {
    margin-top: 20px;
    text-align: center;
}
.button-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.button-container button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.button-container button:hover {
    background-color: #0056b3;
}

.input-container {
    margin-top: 20px;
}

.input-container input {
    padding: 10px;
    margin: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: calc(100% - 22px); /* Adjust width to include padding and border */
}
.search-container input[type=text] {
    padding: 10px;
    margin: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: calc(60% - 22px); /* Adjust width to include padding and border */
}

/* .search-container button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    width: calc(40% - 22px); /* Adjust width to include padding and border */
}

.search-container button:hover {
    background-color: #0056b3;
} */
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP with AJAX</h1>
        <div class="search-container">
            <input type="text" id="search_input" placeholder="Search...">
            <!-- <button id="search_button">Search</button> -->
        </div>
        <div class="input-container">
            <input type="text" id="username_input" placeholder="Enter Username">
            <input type="email" id="email_input" placeholder="Enter Email">
            <input type="text" id="password_input" placeholder="Enter Password">
            </div>
            <div class="button-container">
            <button id="insertData">Insert Data</button>
            <button id="button_click">Load Data</button>
        </div>
        <table id="data-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="username">sanjida akter</td>
                    <td id="email">samnjidasamanta277@gmail.com</td>
                    <td id="pass">12345</td>
                    <td><button class="update-btn"> Edit </button></td>
                    <td><button class="delete-btn"> Delete </button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="modal">
        <div id="modal-form">
            <h2>Edit form</h2>
            <table>
                <tr>
                    <td>Email</td>
                    <td><input type="text" id="edit-fname"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" id="edit-lname"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" id="edit-submit" value="save"></td>
                </tr>
            </table>
            <div id="close-btn">X</div>
        </div>
    </div>

    <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#button_click").on("click", function(){
            loadData();
        });

        function loadData() {
            $.ajax({
                url: "ajax-load.php",
                type: "POST",
                success: function(data) {
                    $("#data-table tbody").empty(); // Clear existing content
                    $("#data-table tbody").html(data); // Append new data
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        $("#insertData").on("click", function(e){
            e.preventDefault();
            var fname = $("#username_input").val();
            var femail = $("#email_input").val();
            var fpass = $("#password_input").val();

            $.ajax({
                url: "ajax-insert.php",
                type: "POST",
                data: {username: fname, email: femail, Upassword: fpass},
                success: function(data){
                    if(data == 1){
                        alert("Inserted data");
                        loadData();
                    }
                    else{
                        alert("Can't save data");
                    }
                },
                error: function(xhr, status, error){
                    console.error(error);
                }
            });
        });

        $(document).on("click", ".delete-btn", function(){
            if(confirm("Do you really want to delete this record?")){
                var username = $(this).closest("tr").find("td:first").text();
                var element = this;
                $.ajax({
                    url: "ajax-delete.php",
                    type: "POST",
                    data: {username: username},
                    success: function(data){
                        if(data == 1){
                            alert("Deleted Record Successfully.");
                            $(element).closest("tr").fadeOut();
                        }else{
                            alert("Can't Delete Record.");
                        }
                    }
                });
            }
        });

        // Show Modal Box
        $(document).on("click", ".update-btn", function(){
    $("#modal").show();
    var username = $(this).closest("tr").find("td:first").text();
    $.ajax({
        url: "ajax-load-updated-form.php",
        type: "POST",
        data: { username: username },
        success: function(data) {
            $("#modal-form table").html(data);
        }
    });
});
// Hide Modal Box
$(document).on("click", "#close-btn", function(){
    $("#modal").hide();
});
//Save Update Form
$(document).on("click", "#edit-submit", function(){
    var username = $("#edit-username").val();
    var email = $("#edit-fname").val();
    var pass = $("#edit-lname").val();
    $.ajax({
        url: "ajax-update.php",
        type: "POST",
        data: { username: username, email: email, Upassword: pass },
        success: function(data) {
            if(data == 1) {
                $("#modal").hide();
                alert("Updated successfully");
                loadData(); // Reload data after update
            }
            else{
                alert("No Updation occurs");
            }
        }
    });
});
//live search 
$("#search_input").on("keyup", function(){
                var search = $(this).val();
                $.ajax({
                    url: "search.php",
                    type: "POST",
                    data: { search: search },
                    success: function(data) {
                        $("#data-table").html(data);
                    }
                });
            });
});
</script>
</body>
</html>
