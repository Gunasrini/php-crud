<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>

    <body>

        <div class="container mt-3 bg-secondary p-4 text-white">
            <div class="row">
                <div class="col-md-3">
                    <h2>Add Students</h2>
                    <form id="studForm" method="POST">
                        <div class="mb-3 mt-3">
                            <label for="name" class="mb-2">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="mb-2">Age:</label>
                            <input type="number" class="form-control" id="age" placeholder="Enter Age" name="age">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="city" class="mb-2">City:</label>
                            <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
                        </div>
                        <input type="hidden" name="id" id="id" value="0"/>
                        <button type="submit" id="saveForm" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <div class="col-md-8 ms-auto">
                    <div id="studentsList"></div>
                </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#studentsList").load("view.php");
                $("#saveForm").click(function() {
                    let id = $("#id").val();
                    if(id==0) {
                        alert("Insert");
                        $.ajax({
                            url: "insert.php",
                            type: "POST",
                            data: $("#studForm").serialize(),
                            success: function(d) {
                                alert(d);
                            }

                        })
                    } else {
                        // alert("Update");
                        $.ajax({
                            url: "update.php",
                            type: "POST",
                            data: $("#studForm").serialize(),
                            success: function(d) {
                                alert(d);
                                $("#id").val("0");
                            }
                        });
                    }                   
                });
                $(document).on('click','.delRow',function(){
                    let del = $(this);
                    let id = $(this).attr("data-id");
                    // alert(id);
                    $.ajax({
                        url: "delete.php",
                        type: "post",
                        data: {id: id},
                        success: function() {
                            $(del).closest("tr").remove();
                        }
                    }); 
				});
                $(document).on('click','.editRow',function(){
                    let edit = $(this);
                    let id = $(this).attr("data-id");
                    $("#id").val(id);
                    let name = edit.closest("tr").find("td:eq(1)").text();
                    let age = edit.closest("tr").find("td:eq(2)").text();
                    let city = edit.closest("tr").find("td:eq(3)").text();
                    $("#name").val(name);
                    $("#age").val(age);
                    $("#city").val(city);
				});
            })
        </script>
    </body>

</html>
