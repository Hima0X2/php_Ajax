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
        .delete-btn{
            background : red;
            color : white;
            border : 0;
            cursor : pointer;
        }
        .delete-btn:hover {
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP with AJAX</h1>
        <button id="button_click">Load Data</button>
        <div class="input-container">
            <input type="text" id="username_input" placeholder="Enter Username">
            <input type="email" id="email_input" placeholder="Enter Email">
            <input type="text" id="password_input" placeholder="Enter Password">
            <button id="insertData">Insert Data</button>
        </div>
        <table id="data-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="username">sanjida akter</td>
                    <td id="email">samnjidasamanta277@gmail.com</td>
                    <td id="pass">12345</td>
                </tr>
            </tbody>
        </table>
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
                        alert("inserted data");
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
        $(document).on("click",".delete-btn", function(){
      if(confirm("Do you really want to delete this record ?")){
        var username = $(this).data("username");
        var element = this;

        $.ajax({
          url: "ajax-delete.php",
          type : "POST",
          data : {username : username},
          success : function(data){
              if(data == 1){
                $(element).closest("tr").fadeOut();
              }else{
                $("#error-message").html("Can't Delete Record.").slideDown();
                $("#success-message").slideUp();
              }
          }
        });
      }
    });
    });
</script>

</body>
</html>
