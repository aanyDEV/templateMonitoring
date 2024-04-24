<?php include('Layout/header.php') ?>

<div class="wrapper">

    <!-- Sidebar -->
    <?php include('Layout/sidebar.php') ?>
    <!-- Page Content -->
    <div id="content">
    <div class="container">
    <h1>Tabel Data</h1>

    <table class="table table-bordered table-dark">
  <!-- Nama Kolom -->
    <thead>
    <tr>
      <th scope="col">Nomor</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Waktu</th>
      <th scope="col">Pressure 1</th>
      <th scope="col">Pressure 1</th>
      <th scope="col">Pressure 1</th>
      <th scope="col">Temperature 1</th>
      <th scope="col">Temperature 2</th>
      <th scope="col">Temperature 3</th>
    </tr>
  </thead>

  <!-- Isi tabel -->
  <tbody>
  <?php
        include('configuration/conn.php');
        $query = "(SELECT * FROM data ORDER BY id DESC LIMIT 10) ORDER BY id ASC";
        $read = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($read)){
        ?>
        <tr>
          <th scope="row"><?php echo $row['id']; ?></th>
          <td><?php echo $row['tanggal'] ?></td>
          <td><?php echo $row['waktu'] ?></td>
          <td><?php echo $row['pressure1'] ?></td>
          <td><?php echo $row['pressure2'] ?></td>
          <td><?php echo $row['pressure3'] ?></td>
          <td><?php echo $row['temp1'] ?></td>
          <td><?php echo $row['temp2'] ?></td>
          <td><?php echo $row['temp3'] ?></td>
        <?php } ?>
  </tbody>
</table>
</div>
    </div>
</div>

<?php include('Layout/footer.php') ?>