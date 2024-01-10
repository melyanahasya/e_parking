<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - Parking</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* Fontawesome */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            height: 100vh;
            align-items: stretch;
        }

        .left-section {
            background: url('https://img.freepik.com/premium-vector/men-woman-co-working-doing-their-job_24877-61919.jpg') no-repeat center center;
            display: none;
            margin-left: 5%;

        }

        .right-section {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgb(10 75 90);
            width: 100%;
            max-width: 450px;
        }

        .login-form h2 {
            color: #365486;
            text-align: center;
            margin-bottom: 35px;
        }

        .login-title i {
            margin-right: 10px;
            color: #365486;
        }

        .form-control {
            position: relative;
            margin-bottom: 30px;
        }

        .form-control i {
            position: absolute;
            left: 15px;
            top: 14px;
            color: #365486;
        }

        .form-control input {
            width: 100%;
            max-width: 95%;
            padding: 12px 0 12px 37px;
            border: 2px solid #00569f1c;
            background-color: rgb(232, 232, 232);
            color: rgb(50, 73, 94);
            border-radius: 6px;
            transition: all 0.3s ease-in-out 0s;
        }

        .form-control input:focus {
            outline: none;
            border: 2px solid #ffd8a1;
        }

        .form-control input:invalid:not(:focus):not(:placeholder-shown) {
            border: 2px solid #ff3860;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me .checkbox-custom {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            display: inline-block;
            vertical-align: middle;
            position: relative;
            border: 2px solid #027186;
            border-radius: 3px;
            cursor: pointer;
            background-color: #f7f7f7;
            transition: background-color 0.3s, border-color 0.3s;
            background-color: #f7f7f7;
            transition: background-color 0.3s, border-color 0.3s;
            pointer-events: none;
        }

        .remember-me .checkbox-custom::after {
            content: '';
            position: absolute;
            left: 5px;
            top: 1px;
            width: 6px;
            height: 11px;
            border: solid #027186;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
            border: solid white;
            border-width: 0 2px 2px 0;
            display: none;
        }

        .remember-me label {
            color: #333;
            font-size: 0.95em;
            cursor: pointer;
        }

        .remember-me input[type="checkbox"] {
            display: none;
        }

        .remember-me input[type="checkbox"]:checked+.checkbox-custom::after {
            display: block;
        }

        .remember-me input[type="checkbox"]:checked+.checkbox-custom {
            background-color: #027186;
            border-color: #027186;
        }

        button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background-color: #365486;
            color: white;
            font-size: 17px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button:hover {
            background-color: #365486;
        }

        .password-toggle-login {
            margin-left: 92%;
        }

        /*Responsive*/
        @media screen and (min-width: 768px) {
            .left-section {
                display: block;
                flex: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-section"></div>
        <div class="right-section">
            <div class="login-container">
                <form action="<?php echo base_url('auth/login') ?>" method="post" class="login-form">
                    <h2 class="login-title"><i class="fas fa-user-circle"></i> Login</h2>
                    <div class="form-control">
                        <i class="fas fa-user icon"></i>
                        <input type="text" placeholder="Username" id="username" required>
                    </div>
                    <div class="form-control">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" placeholder="Password" id="password">
                        <i class="password-toggle-login fa fa-eye-slash" onclick="togglePassword()"></i>
                    </div>
                    <div class="remember-me">
                        <label for="rememberMe">Tidak memiliki akun ? <a
                                href="<?php echo base_url('auth/register_user') ?>">Register</a> </label>
                    </div>


                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- <script>
        // Wait for the DOM to load before running the script
        document.addEventListener('DOMContentLoaded', function () {

            // Get the remember-me container, checkbox, and custom checkbox from the DOM
            var rememberMeContainer = document.querySelector('.remember-me');
            var checkbox = rememberMeContainer.querySelector('input[type="checkbox"]');
            var checkboxCustom = rememberMeContainer.querySelector('.checkbox-custom');

            // Add a click event listener to the remember-me container
            rememberMeContainer.addEventListener('click', function (event) {
                // If the clicked element isn't the checkbox itself, toggle the checkbox
                if (event.target !== checkbox) {
                    checkbox.checked = !checkbox.checked;

                    // Manually trigger the change event on the checkbox
                    var changeEvent = new Event('change', {
                        'bubbles': true,
                        'cancelable': true
                    });
                    checkbox.dispatchEvent(changeEvent);
                }
            });

            // Add a change event listener to the checkbox
            checkbox.addEventListener('change', function () {
                // This function will be called any time the checkbox is checked or unchecked
                // You can add any additional functionality you need here
            });

            // Optional: If you have a form and want to perform a custom submit action
            var form = document.querySelector('.login-form');
            form.addEventListener('submit', function (event) {
                // Prevent the default form submit
                event.preventDefault();

                // You can add custom form submit functionality here
                // For example, you could use AJAX to submit the form data to your server
            });

            // Additional event listeners and functionality can be added below
        });

    </script> -->

    <script>

        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var passwordToggle = document.querySelector(".password-toggle-login");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggle.classList.remove("fa-eye-slash");
                passwordToggle.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                passwordToggle.classList.remove("fa-eye");
                passwordToggle.classList.add("fa-eye-slash");
            }
        }

        <?php if ($this->session->flashdata('success_pass')) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Mengganti Password!',
                text: '<?php echo $this->session->flashdata('success'); ?>',
                showConfirmButton: false,
                timer: 2500
            }).then(() => {
                window.location.href = '<?php echo base_url(); ?>';
            });
        <?php } ?>


        <?php if ($this->session->flashdata('error')): ?>
            // Tampilkan SweetAlert jika terdapat error dari session
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '<?= $this->session->flashdata('error'); ?>',
                timer: 2500, // Waktu tampilan SweetAlert dalam milidetik (3.5 detik)
                showConfirmButton: false, // Menghilangkan tombol "OK"
                timerProgressBar: true // Menampilkan progress bar
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = 'http://localhost/e_parking/'; // Redirect atau lakukan tindakan lain jika diperlukan setelah SweetAlert hilang
                }
            });
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            // Tampilkan SweetAlert jika login berhasil
            Swal.fire({
                icon: 'success',
                title: 'Registrasi Berhasil',
                text: '<?= $this->session->flashdata('success'); ?>',
                timer: 2500, // Waktu tampilan SweetAlert dalam milidetik (3.5 detik)
                showConfirmButton: false, // Menghilangkan tombol "OK"
                timerProgressBar: true // Menampilkan progress bar
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = 'http://localhost/e_parking/'; // Redirect atau lakukan tindakan lain jika diperlukan setelah SweetAlert hilang
                }
            });
        <?php endif; ?>

        function displaySweetAlert() {
            const success_logout = "<?php echo $this->session->flashdata('success_logout'); ?>";

            if (success_logout) {
                Swal.fire({
                    title: 'Berhasil Keluar',
                    text: success_logout,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        }

        // Memanggil fungsi saat halaman siap
        window.onload = function () {
            displaySweetAlert();
        };

    </script>
</body>

</html>