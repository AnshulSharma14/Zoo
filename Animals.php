<?php
include('config.php');
include('Header.php');
session_start();
$user_profile = $_SESSION["user_name"];
if (!isset($_SESSION['user_name'])) {
  header("Location:http://index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Animals</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="Stylesheet.css">
</head>

<body onload="loadBody()">

  <div class="modal fade" id="AddAnimalModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ModalLabel">Add Animals</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="post" id="saveAnimal">
          <div class="modal-body">
            <div class="mb-3">
              <input type="hidden" class="form-control" id="Id" name="id">
              <label for="">Name</label>
              <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
              <label for="Gender" name="Gender">Gender</label>
              <input type="radio" id="Gender" name="Gender" value="male">
              <label for="Male">Male</label>
              <input type="radio" id="Gender" name="Gender" value="female">
              <label for="Female">Female</label>
            </div>
            <div class="mb-3">
              <label for="">Select Zoo</label>
              <select name="Zoo_name" class="form-control">
                <option value="Select">select Zoo</option>
                <?php
                $query = "SELECT Id,Name FROM zoo";
                $sql = $conn->query($query);
                while ($row = mysqli_fetch_array($sql)) {
                  echo "<option value=\"{$row['Id']}\">" . $row['Name'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <input type="hidden" name="activity-status" class="form-control" id="activity-status">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" onclick="insertAnimals()">Save animal</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container mt-3 ">
    <div class="row">
      <div class="col-md-12">
        <h4 class="text-center text-primary text-uppercase font-weight-bold display-4">Animals</h4>
        <div class="d-flex float-right">
          <button type="button" class="btn btn-primary btn-lg d-flex float-right mb-3" data-bs-toggle="modal"
            data-bs-target="#AddAnimalModal">
            + Add Animals</button>
        </div>
      </div>
      <div class="" id="data">

      </div>
    </div>
  </div>
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
  <script>
    //initial function to load the body

    function loadBody() {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'animals_crud.php');
      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("data").innerHTML = this.responseText;
        }
      };
      xhr.send();
    }
    //function to insert the data into into table

    function insertAnimals() {
      var formElement = document.querySelector('form');
      formElement.addEventListener('submit', (event) => {
        event.preventDefault();
      });
      var name = document.getElementById("name").value;
      var Gender = document.getElementById("Gender").value;
      var id = document.getElementById("Id").value;
      //var Zoo_id=document.getElementById("").value;
      console.log('adding');
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'animals_crud.php');
      var data = new FormData(formElement);
      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          //alert("record added successfully");
          document.getElementById("data").innerHTML = this.responseText;
        }
      };
      xhr.send(data);
    }
    //function to delete data

    function deleteRecords(id) {
      var data = id;
      console.log(data);
      console.log("inside")
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'animals_crud.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("data").innerHTML = this.responseText;
        }
      };
      xhr.send("Id=" + data)
    }
    //function to fetch record
    function updateRecord(id) {
      console.log(id);
      var data = id.slice(1);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'animals_crud.php')
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var string_result = this.responseText;
          var arr = string_result.split(",");
          var id = arr[0];
          var animal_name = arr[1];
          var gender = arr[2];
          var Zoo_id = arr[3];
          var Zoo_name = arr[4];
          // document.getElementById("name").value = name;
          // document.getElementById("location").value = location;
          // document.getElementById("Id").value = id;
        }
      };
      xhr.send("id=" + data);
    }
  </script>
</body>

</html>