<?php
include('config.php');
include('Header.php');
// session_start();
// $user_profile = $_SESSION["user_name"];
// if (!isset($_SESSION['user_name'])) {
//     header("Location:http://index.php");
// }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zoo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="Stylesheet.css">
</head>

<body onload="bring()">

    <div class="modal fade" id="AddZooModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title mtitle fs-5" id="ModalLabel">Add Zoo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="saveZoo">
                    <div class="modal-body form-group">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="Id" name="id">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="">Location</label>
                            <input type="text" name="location" class="form-control" id="location">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="AddRecords()" id="btnsub">Save
                            Zoo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="container mt-3 ">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center text-primary text-uppercase font-weight-bold display-4">Zoo</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                        data-bs-target="#AddZooModal"> + Add Zoo</button>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <h3 class="text-primary">All Records -></h3>
            <div class="container mt-5">
                <div class="row">
                    <div class="center">
                        <div id="data" class="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script>

        //function to bring table in initial load
        function bring() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'AddZoo.php');
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //alert("record added successfully");
                    document.getElementById("data").innerHTML = this.responseText;
                }
            };
            xhr.send();
        }
        //function to add record into table
        function AddRecords() {
            let formElement = document.querySelector('form');
            formElement.addEventListener('submit', (event) => {
                event.preventDefault();
            })
            var name = document.getElementById("name").value;
            var location = document.getElementById("location").value;
            var id = document.getElementById("Id").value;
            //for adding record
            if (id == null) {
                console.log('adding');
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'AddZoo.php');
                var data = new FormData(formElement);
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //alert("record added successfully");
                        document.getElementById("data").innerHTML = this.responseText;
                    }
                };
                xhr.send(data);
            }
            //for updating record
            else {
                console.log('updating');
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'AddZoo.php');
                var data = new FormData(formElement);
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //alert("record added successfully");
                        document.getElementById("data").innerHTML = this.responseText;
                    }
                };
                xhr.send(data);
            }
        }
        //function to delete data
        function deleteRecords(id) {
            console.log(id);
            var data = id;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'AddZoo.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("data").innerHTML = this.responseText;
                }
            };
            xhr.send("id=" + data);
        }
        //
        function updateRecord(id) {
            var id = id.slice(1);
            console.log(id);
            var xhr = new XMLHttpRequest();
            var heading = document.getElementById('btnsub');
            heading.innerHTML = 'Update';
            console.log(heading);

            xhr.open('POST', 'AddZoo.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var string_result = this.responseText;
                    var arr = string_result.split(",");
                    var name = arr[0];
                    var location = arr[1];
                    var id = arr[2];
                    document.getElementById("name").value = name;
                    document.getElementById("location").value = location;
                    document.getElementById("Id").value = id;

                    //document.getElementById()
                }
            };
            xhr.send("Id=" + id);
        }
    </script>

</body>

</html>