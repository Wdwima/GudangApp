<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kelola Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Plaza Oleos</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <a class="nav-link" href="permintaan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Permintaan Barang
                            </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="barang_masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="barang_keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelola Admin
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Permintaan Barang</h1>


                        <div class="card mb-4">
                            <div class="card-header">
                              <!-- Button to Open the Modal "Tambah Barang"-->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                             Tambah Permintaan
                             </button>
                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama barang</th>
                                                <th>Unit</th>
                                                <th>Quantity</th>
                                                <th>Keterangan</th>
                                                <th>Bukti</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $ambilsemuadatapermintaan = mysqli_query($conn,"select * from permintaan");
                                                $i = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadatapermintaan)){
                                                $tanggal = $data['tanggal'];
                                                $namabarang = $data['namabarang'];
                                                $unit = $data['unit'];
                                                $qtypermintaan = $data['qtypermintaan'];
                                                $ket = $data['keterangan'];
                                                $idp = $data['idpermintaan'];
                                                $bukti = $data['bukti'];
                                            ?>

                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$tanggal;?></td>
                                                <td><?=$namabarang;?></td>
                                                <td><?=$unit;?></td>
                                                <td><?=$qtypermintaan;?></td>
                                                <td><?=$ket;?></td>
                                                <td><?=$bukti;?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idp;?>">
                                                    Edit
                                                     </button>
                                                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idp;?>">
                                                    Delete
                                                     </button>
                                                </td>
                                            </tr>
                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="edit<?=$idp;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Edit Permintaan</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                                                        <br>
                                                        <input type="text" name="qtypermintaan" value="<?=$qtypermintaan;?>" class="form-control" required>
                                                        <br>
                                                        <input type="hidden" name="id" value="<?=$idpermintaan;?>">
                                                        <button type="submit" class="btn btn-primary" name="updatepermintaan">Submit</button>
                                                        </div>
                                                        </form>

                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                </div>

                                                   <!-- Delete Modal -->
                                                    <div class="modal fade" id="delete<?=$idp;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Permintaan</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        Apakah Anda Yakin Ingin Menghapus <?=$namabarang;?>?
                                                        <input type="hidden" name="idpermintaan" value="<?=$idp;?>">
                                                        <br>
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="hapuspermintaan">Hapus</button>
                                                        </div>
                                                        </form>

                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                </div>


                                            <?php
                                            };

                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

                                <!-- The Modal "Tambah Permintaan"-->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Tambah Permintaan</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method="post">
                                    <div class="modal-body">
                                    <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
                                    <br>
                                    <input type="text" name="unit" placeholder="Unit" class="form-control" required>
                                    <br>
                                    <input type="Number" name="qtypermintaan" placeholder="Quantity" class="form-control" required>
                                    <br>
                                    <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" required>
                                    <br>
                                    <input type="file" name="bukti" placeholder="Bukti" class="form-control" required>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="addnewpermintaan">Submit</button>
                                    </div>
                                    </form>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>

</html>
