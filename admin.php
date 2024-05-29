<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<bod class="">
  <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container">
      <img src="./ceren_logo.jpg" alt="logo" class="rounded-circle" style="height: 60px" />
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <span class="nav-link active">Hoşgeldin
              <?php
              session_start();
              echo $_SESSION['kullanici_adi'];
              echo " ";
              echo $_SESSION['kullanici_soyadi']; ?></span>
          </li>

          <li class="nav-item">

            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Ekle
            </button>


            <div class="modal fade text-white" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ürün Ekle</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="ekle.php" method="post" enctype="multipart/form-data" class="container">
                      <div class="mb-3">
                        <label for="urun_ismi" class="form-label">Ürün İsmi</label>
                        <input type="text" class="form-control" id="urun_ismi" name="urun_ismi" required>
                      </div>
                      <div class="mb-3">
                        <label for="urun_aciklama" class="form-label">Ürün Açıklama</label>
                        <textarea class="form-control" id="urun_aciklama" name="urun_aciklama" rows="3"
                          required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="urun_fiyat" class="form-label">Ürün Fiyat</label>
                        <input type="number" class="form-control" id="urun_fiyat" name="urun_fiyat" required>
                      </div>
                      <div class="mb-3">
                        <label for="urun_turu_id" class="form-label">Ürün Türü</label>
                        <select class="form-select" id="urun_turu_id" name="urun_turu_id" required>
                          <!-- Türleri dinamik olarak veritabanından çekebiliriz -->
                          <option value="1">Sıcak</option>
                          <option value="2">Soğuk</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="urun_resmi" class="form-label">Ürün Resmi</label>
                        <input type="file" class="form-control" id="urun_resmi" name="urun_resmi" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Ekle</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </li>




        </ul>
        <a href="cikisyap.php" class="btn btn-outline-danger">Çıkışyap</a>
      </div>
    </div>
  </nav>

  <table class="table table-secondary table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Resim</th>
        <th scope="col">İsim</th>
        <th scope="col">Açıklama</th>
        <th scope="col">Fiyat</th>
        <th scope="col">Tür</th>
        <th scope="col">Durum</th>
      </tr>
    </thead>
    <tbody>

      <?php
      include 'connect.php';

      // Ürün türü 2 olan ürünleri ve tür isimlerini almak için sorgu
      $ürün_query = "SELECT u.id AS ürün_id, u.urun_ismi, u.urun_resmi, u.urun_fiyat, u.urun_aciklama, t.tur_ismi 
                   FROM `ürün` u 
                   JOIN `ürün_türü` t ON u.urun_turu_id = t.id  
                   ORDER BY u.id";

      $result = $conn->query($ürün_query);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '  <th scope="row">' . $row["ürün_id"] . '</th>';
          echo '  <td><img src="' . $row["urun_resmi"] . '" alt="Image" class="rounded-md" style="width: 50px; height: 50px;"></td>';
          echo '  <td>' . $row["urun_ismi"] . '</td>';
          echo '  <td>' . $row["urun_aciklama"] . '</td>';
          echo '  <td>' . $row["urun_fiyat"] . ' TL</td>';
          echo '  <td>' . $row["tur_ismi"] . '</td>';
          echo '  <td> <a href="./sil.php/?id=' . $row["ürün_id"] . '" class="btn btn-outline-danger">Sil</a></td>';
          echo '</tr>';
        }
      } else {
        echo "<tr><td colspan='7' class='text-center text-white'>Herhangi bir içecek bulunmamaktadır</td></tr>";
      }

      $conn->close();
      ?>

    </tbody>
  </table>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</bod>

</html>