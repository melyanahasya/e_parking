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
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <style id='global-styles-inline-css' type='text/css'>
        .container-form {
            max-width: 90%;
            width: 100%;
            margin-top: 5%;
            padding: 25px 30px;
            margin: 5%;
            border-radius: 5px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
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

            .masuk_parkir {
                margin-top: 5rem;
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
                                                                <h2 class="title s-animate-2">Pembayaran</h2>
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

                <section>
                    
                    <div class="container-form">
                        <!-- <div class="title-header-left">Pembayaran</div> -->
                        <form method="post" action="<?= base_url('Pengguna/aksi_keluar'); ?>">
                            <div class="user_details">
                                <div class="input_poxs">
                                    <span for="nominal" class="datails">Nominal</span>
                                    <input name="nominal_bayar" type="number" placeholder="Nominal..." required>
                             
                                </div>

                                <p>*Diharapkan memasukkan uang pas</p>

                                
                                <p>Tarif Motor : Rp 2. 000, 00</p>
                                <p>Tarif Mobil / Bus / Truk : Rp 4. 000, 00</p>

                            </div>

                            <div class="button">
                                <input type="submit" onclick="" value="Kirim">
                            </div>
                        </form>
                    </div>
                </section>

                


                <?php $this->load->view('componen/footer'); ?>

            </div>
        </div>
        <div class="back-to-top">
            <span class="back-top"><i class="fa fa-angle-up"></i></span>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <div class="body-overlay" id="body-overlay"></div>


    <!-- <?php if ($this->session->flashdata('alert')): ?>
        <script>
            Swal.fire({
                title: '<?= $this->session->flashdata('alert')['type'] == 'success' ? 'Pembayaran Berhasil' : 'Kesalahan'; ?>',
                text: '<?= $this->session->flashdata('alert')['message']; ?>',
                icon: '<?= $this->session->flashdata('alert')['type'] == 'success' ? 'success' : 'error'; ?>',
            });
        </script>
    <?php endif; ?> -->

    <?php if (isset($error_message)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: '<?php echo $error_message; ?>',
                showConfirmButton: false
            });
            setTimeout(function () {
                window.location.href = '<?php echo $redirect_url; ?>';
            }, 2000);
        });
    </script>
<?php endif; ?>
    <?php if (isset($success_message)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Terjadi Kesalahan',
                text: '<?php echo $success_message; ?>',
                showConfirmButton: false
            });
            setTimeout(function () {
                window.location.href = '<?php echo $redirect_url; ?>';
            }, 2000);
        });
    </script>
<?php endif; ?>


</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<?php if ($this->session->flashdata('error_pembayaran')): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        Swal.fire({
            title: 'Gagal Melakukan Pembayaran!',
            text: '<?php echo $this->session->flashdata('error_pembayaran'); ?>',
            icon: 'error',
            showConfirmButton: false,
            timer: 2000,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url('pengguna/pembayaran'); ?>";
            }
        });
    </script>
<?php endif; ?>
</html>