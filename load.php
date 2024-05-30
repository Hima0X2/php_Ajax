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
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP with AJAX</h1>
        <button id="button_click" onclick="loadData()">Load Data</button>
        <div class="input-container">
            <!-- <input type="text" id="username_input" placeholder="Enter Username">
            <input type="email" id="email_input" placeholder="Enter Email">
            <input type="password" id="password_input" placeholder="Enter Password">
            <button id="insertData">Insert Data</button> -->
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
            $("#button_click").on("click",function(e){
                $.ajax({
                    url : "ajax-load.php",
                    type : "POST",
                    success : function(data){
                        $("#data-table").html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>
