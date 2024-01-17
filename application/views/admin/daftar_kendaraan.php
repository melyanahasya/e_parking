<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <title>E - Parking</title>
    <meta name='robots' content='max-image-preview:large' />
    <link rel='dns-prefetch' href='//use.fontawesome.com' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel="alternate" type="application/rss+xml" title="Itechie &raquo; Feed"
        href="https://wp-themes.solverwp.com/itechie/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Itechie &raquo; Comments Feed"
        href="https://wp-themes.solverwp.com/itechie/comments/feed/" />
    <meta name="generator" content="WordPress 6.4.2" />

    <meta name="generator"
        content="Elementor 3.17.3; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints, block_editor_assets_optimize, e_image_loading_optimization; settings: css_print_method-external, google_font-enabled, font_display-swap">

    <style id='global-styles-inline-css' type='text/css'>
        .container-form {
            max-width: 90%;
            width: 100%;
            /* margin-top: 5%; */
            padding: 25px 30px;
            /* margin: 5%; */
            border-radius: 5px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .container .title-header-left {
            color: white;
        }

        .container .title-header-left h1 {
            text-align: center;
        }

        .container form .user_details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        form .user_details .input_poxs {
            margin-bottom: 15px;
            margin: 20px 0 12px 0;
            width: 100%;
        }

        .user_details .input_poxs .datails {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user_details .input_poxs input {
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;

        }

        .user_details .input_poxs input:focus,
        .user_details .input_poxs input:valid {
            border-color: #9b59b6;
        }

        form input[type="radio"] {
            display: none;
        }

        form .button {
            height: 45px;
            margin: 45px 0;
        }

        form .button input {
            height: 100%;
            width: 100%;
            outline: none;
            color: #fff;
            border: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 5px;
            letter-spacing: 1px;
            background: linear-gradient(123deg, #71b8e7, #9b59b6);

        }

        form .button input :hover {
            background: linear-gradient(-123deg, #71b8e7, #9b59b6);
        }

        @media (max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .user_details .input_pox {
                margin-bottom: 15px;
                width: 100%;
            }

            form .gender_details .category {
                width: 100%;
            }

            .container form .user_details {
                max-height: 300px;
                overflow: scroll;
            }

            .user_details::-webkit-scrollber {
                width: 0;
            }


        }

        tbody {
            text-align: center;
        }

        thead {
            text-align: center;
        }

        .btn-hapus {
            background-color: #D24545;
            border-radius: 5px;
            width: 30%;
            height: 50%;
            border: none;
            color: white;
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
        }


        .lenght-all {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5%;
            margin-top: 4%;
        }

        .container-lenght {
            flex: 1;
            min-width: 180px;
            max-width: 250px;
            border: 2px solid #365486;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .container-lenght:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .title-header-left {
            background: #365486;
            color: white;
            text-align: center;
            padding: 1.5%;
            margin-bottom: 5px;
            border-bottom: 2px solid #2c4761;
        }

        h1 {
            text-align: center;
            margin: 0;
            font-size: 24px;
            color: #365486;
            padding: 10px;
            background: #f0f0f0;
        }

        @media (max-width: 768px) {
            .lenght-all {
                flex-direction: column;
                align-items: center;
            }

            .container-lenght {
                min-width: 80%;
                max-width: 80%;
                margin-bottom: 30px;
            }

            h1 {
                line-height: 1.5;
            }
        }
    </style>

</head>


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
                                                                <h2 class="title s-animate-2">Daftar
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


                <section class="lenght-all">
                    <div class="container-lenght">
                        <div class="title-header-left">Jumlah Motor</div>
                        <h1>
                            <?= $jumlah_motor ?>
                        </h1>
                    </div>
                    <div class="container-lenght">
                        <div class="title-header-left">Jumlah Mobil</div>
                        <h1>
                            <?= $jumlah_mobil ?>
                        </h1>
                    </div>
                    <div class="container-lenght">
                        <div class="title-header-left">Jumlah Truk / Bus / Lainnya</div>
                        <h1>
                            <?= $jumlah_truk_bus_lainnya ?>
                        </h1>
                    </div>
                </section>
                <section>
                    <div class="container-form">
                        <div style="background:#365486; color:white; text-align: center; padding: 1%;"
                            class="title-header-left">Daftar Kendaraan</div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 3rem" scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Plat Nomor</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Merk</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Jam Masuk</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    if (empty($daftar)) {
                                        echo '<tr><td colspan="9">Data kosong</td></tr>';
                                    } else {
                                        foreach ($daftar as $row) {
                                            $no++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->id_pengguna ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->kode ?>
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
                                                    <button onclick="hapus(<?php echo $row->id ?>)" type="button"
                                                        class="btn-hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
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
        <!-- back to top area start -->
        <div class="back-to-top">
            <span class="back-top"><i class="fa fa-angle-up"></i></span>
        </div>
        <!-- back to top area end -->

    </div>


    <div class="td-search-popup" id="td-search-popup">
        <form action="https://wp-themes.solverwp.com/itechie/" class="search-form">
            <div class="form-group">
                <input type="text" name="s" class="form-control" placeholder="Search....." value="">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="body-overlay" id="body-overlay"></div>



</body>
<script>
    function hapus(id) {
        Swal.fire({
            title: 'Akan Dihapus?',
            text: "data ini tidak bisa dikembalikan lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            background: '#fff',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Sukses Menghapus!!',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(() => {
                    window.location.href = "<?php echo base_url('admin/delete_data/') ?>" + id;
                }, 1800);
            }
        })
    }
</script>

</html>