<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <title>E - Parking</title>
    <meta name='robots' content='max-image-preview:large' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <link rel='dns-prefetch' href='//use.fontawesome.com' />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />

</head>

<style type="text/css" id="wp-custom-css">
    .orange-button {
        background-color: #0B666A;
        color: #fff;
        padding: 8px 12px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .orange-button:hover {
        background-color: #35A29F;

    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #201654;
    }

    tbody {
        text-align: center;
    }

    thead {
        text-align: center;
    }

    .data_kendaraan {
        margin-top: 6rem;
    }

    @media (max-width: 600px) {
        table {
            width: 4.5rem;
            overflow-x: scroll;
        }

        .responsive-3 {
            width: 100%;
        }

        th {
            width: 10rem;
        }

        .container-form .title-header-left {
            color: white;
            display: flex;
            gap: 8%;
        }

        .container-form .title-data {
            text-align: center;
        }
    }
</style>

<body
    class="page-template page-template-elementor_header_footer page page-id-261 itechie-core elementor-default elementor-template-full-width elementor-kit-17 elementor-page elementor-page-261">
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

        <?php $this->load->view('componen/navbar'); ?>
        <div id="content" class="site-content">


            <div data-elementor-type="wp-page" data-elementor-id="261" class="elementor elementor-261">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-b034cb8 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                    data-id="b034cb8" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3436b3a"
                            data-id="3436b3a" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-a63a71b elementor-widget elementor-widget-itechie-banner-widget"
                                    data-id="a63a71b" data-element_type="widget"
                                    data-widget_type="itechie-banner-widget.default">
                                    <div class="elementor-widget-container">
                                        <div class="banner-area banner-area-3">
                                            <div class="item bg-overlay"
                                                style="background-image: url(https://png.pngtree.com/background/20230612/original/pngtree-line-of-parked-motorcycles-picture-image_3176176.jpg);">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-9">
                                                            <div class="banner-inner style-white text-center">
                                                                <h2 class="title s-animate-2">Data
                                                                    <span>Kendaraan</span>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="data_kendaraan">
                    <div class="container-form">
                        <div class="title-header-left"
                            style="background:#365486; color:white; text-align: center; padding: 1%;">
                            <div class="title-data">
                                Data Kendaraan
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>

                                    <tr>
                                        <th style="width: 3rem" scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Plat Nomor</th>
                                        <th scope="col">Jenis </th>
                                        <th scope="col">Merk </th>
                                        <th scope="col">Status </th>
                                        <th scope="col">Jam Masuk </th>
                                        <th scope="col">Aksi </th>
                                    </tr>
                                </thead>
                                <tbody style="text-transform: capitalize;">
                                    <?php
                                    $no = 0;
                                    if (empty($daftar)) {
                                        echo '<tr><td colspan="8"> Data kosong</td></tr>';
                                    } else {
                                        foreach ($daftar as $row) {
                                            $no++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->username ?>
                                                </td>

                                                <td>
                                                    <?php echo $row->plat_nomor ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->jenis ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->merk ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->status ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->jam_masuk ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('pengguna/struk_pembayaran') ?>"
                                                        class="orange-button"><i class="fas fa-info-square"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>

                <?php $this->load->view('componen/footer'); ?>

            </div>
        </div>

    </div>


</body>
<?php if ($this->session->flashdata('success_message')): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '<?php echo $this->session->flashdata('success_message'); ?>',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url('pengguna/data_kendaraan'); ?>";
            }
        });
    </script>
<?php endif; ?>


<?php if ($this->session->flashdata('berhasil_bayar')): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '<?php echo $this->session->flashdata('berhasil_bayar'); ?>',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url('pengguna/data_kendaraan'); ?>";
            }
        });
    </script>
<?php endif; ?>


</html>