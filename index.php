<?php include('Layout/header.php') ?>
<div class="wrapper">

  <!-- Sidebar -->
  <?php include('Layout/sidebar.php') ?>

  <!-- Page Content -->
  <div id="content">
    <div class="container">

      <h1>My Monitoring Dashboard</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Card -->
        <div class="col">
          <div class="card h-100 text-white bg-dark mb-3 shadow-sm" id="card">
            <div class="row g-0">
              <div id="canvas" style="width:100%">
                <img src="Logo/PT.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <p class="card-title">Pressure 101</p>
                  <h1 class="card-text" id='pressure_101'></h1>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card -->
        <div class="col">
          <div class="card h-100 text-white bg-dark mb-3 shadow-sm" id="card">
            <div class="row g-0">
              <div id="canvas" style="width:100%">
                <img src="Logo/PT.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <p class="card-title">Pressure 102</p>
                  <h1 class="card-text" id='pressure_102'></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card -->
        <div class="col">
          <div class="card h-100 text-white bg-dark mb-3 shadow-sm" id="card">
            <div class="row g-0">
              <div id="canvas" style="width:100%">
                <img src="Logo/PT.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <p class="card-title">Pressure 103</p>
                  <h1 class="card-text" id='pressure_103'></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card -->
        <div class="col">
          <div class="card h-100 text-white bg-dark mb-3 shadow-sm" id="card">
            <div class="row g-0">
              <div id="canvas" style="width:100%">
                <img src="Logo/TTr.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <p class="card-title">Temperature 101</p>
                  <h1 class="card-text" id='temp_101'></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card -->
        <div class="col">
          <div class="card h-100 text-white bg-dark mb-3 shadow-sm" id="card">
            <div class="row g-0">
              <div id="canvas" style="width:100%">
                <img src="Logo/TTr.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <p class="card-title">Temperature 102</p>
                  <h1 class="card-text" id='temp_102'></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card -->
        <div class="col">
          <div class="card h-100 text-white bg-dark mb-3 shadow-sm" id="card">
            <div class="row g-0">
              <div id="canvas" style="width:100%">
                <img src="Logo/TTr.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <p class="card-title">Temperature 103</p>
                  <h1 class="card-text" id='temp_103'></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script>
  function loadXMLDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "data_trans.php", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var obj = JSON.parse(xhttp.responseText);
        document.getElementById("pressure_101").innerText = obj.pressure1;
        document.getElementById("pressure_102").innerText = obj.pressure2;
        document.getElementById("pressure_103").innerText = obj.pressure3;
        document.getElementById("temp_101").innerText = obj.temp1;
        document.getElementById("temp_102").innerText = obj.temp2;
        document.getElementById("temp_103").innerText = obj.temp3;
      }
    };
  }
  setInterval(function() {
    loadXMLDoc();
  }, 1000);

  window.onload = loadXMLDoc;
</script>
</div>
</div>
</div>

<?php include('Layout/footer.php') ?>