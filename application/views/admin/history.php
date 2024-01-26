<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E - Parking</title>
    <meta name='robots' content='max-image-preview:large' />
    <link rel='dns-prefetch' href='//use.fontawesome.com' />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />

    <style type="text/css">
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .pagination a {
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 4px 13px;
            margin: 0 4px;
            border-radius: 4px;
            border: 1px solid #365486;
            background-color: #365486;
        }

        .pagination a.active,
        .pagination a:hover {
            color: #365486;
            background-color: #fff;
        }

        .pagination .disabled {
            color: #999999;
            pointer-events: none;
            background-color: #f5f5f5;
            border-color: #ddd;
        }

        .pagination a:first-child {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .pagination a:last-child {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }


        .container-form {
            max-width: 90%;
            width: 100%;
            margin-top: 5%;
            padding: 25px 30px;
            margin: 5%;
            border-radius: 5px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .lenght-all {
            display: flex;
            gap: 2%;
            margin: 5% 4%;
        }

        .container-lenght {
            max-width: 90%;
            width: 50%;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .container .title-header-left {
            color: white;
        }

        .container .title-header-left h1 {
            text-align: center;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #201654;
        }

        p,
        .single-blog-inner .single-blog-details p {
            color: #696969;
        }
    </style>

</head>

<style type="text/css" id="wp-custom-css">
    @media all and (max-width: 1599px) {
        .home-2-counter .single-exp-inner.style-white h2 {
            font-size: 40px !important;
        }

        .home-2-counter .section-title {
            margin-bottom: 40px;
        }
    }




    @media all and (max-width: 575px) {
        .td-search-popup.active .search-form {
            visibility: visible;
            opacity: 1;
            width: 90%;
            z-index: 9999;
        }

        .banner-inner.style-white .content br {
            display: none;
        }

    }

    .bl-gray-1 {
        border-left: 1px solid #CDD1D8;
        padding-left: 20px;
    }

    .home-2-counter .single-exp-inner.style-white h2 {
        font-size: 80px;
        line-height: 1;
        font-weight: 700;
    }

    .home-2-counter .section-title {
        margin-bottom: 80px;
    }




    .itechie-footer-builder .mc4wp-response {
        position: absolute;
        bottom: 0;
        font-size: 13px;
        color: #fff;
    }

    .itechie-footer-builder .mc4wp-response p {
        color: #fff;

    }

    .single-testimonial-inner.style-two.text-center {
        margin-top: 0;
    }

    .logo .logo-images {
        display: flex;

    }

    .logo p {
        color: white;
    }

    tbody {
        text-align: center;
    }

    thead {
        text-align: center;
    }

    .history_kendaraan {
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
                                                                <h2 class="title s-animate-2">History
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

                <section class="history_kendaraan">
                    <div class="container-form">
                        <div style="background:#365486; color:white; text-align: center; padding: 1%;"
                            class="title-header-left">History Kendaraan</div>

                        <div class="table-responsive">
                           
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 3rem" scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Plat Nomor</th>
                                        <th scope="col">Jenis </th>
                                        <th scope="col">Merk </th>
                                        <th scope="col">Waktu Masuk </th>
                                        <th scope="col">Waktu Keluar </th>
                                        <th scope="col">Status </th>
                                        <th scope="col">Nominal </th>
                                    </tr>
                                </thead>
                                <tbody style="text-transform: capitalize;">
                                    <?php
                                    $no = 0;
                                    if (empty($result)) {
                                        echo '<tr><td colspan="10">Data kosong</td></tr>';
                                    } else {
                                        foreach ($result as $row) {
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
                                                    <?php echo $row->jam_masuk ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->jam_keluar ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->status ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->nominal_bayar ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>
                            <div class="pagination">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>

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
</body>


</html>