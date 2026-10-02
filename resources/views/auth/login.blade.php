<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h3 class="text-center mb-4">
                        Login Administrator
                    </h3>


                    <!-- ======================================== -->
                    <!-- INI BUAT MENAMPILKAN ERROR LOGIN -->
                    <!-- ======================================== -->

                    @if($errors->any())

                        <div class="alert alert-danger">

                            {{ $errors->first() }}

                        </div>

                    @endif


                    <!-- ======================================== -->
                    <!-- INI BUAT FORM LOGIN -->
                    <!-- ======================================== -->

                    <form
                        action="{{ route('login.process') }}"
                        method="POST">

                        @csrf


                        <!-- ======================================== -->
                        <!-- INI BUAT INPUT EMAIL -->
                        <!-- ======================================== -->

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email">

                        </div>


                        <!-- ======================================== -->
                        <!-- INI BUAT INPUT PASSWORD -->
                        <!-- ======================================== -->

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password">

                        </div>


                        <!-- ======================================== -->
                        <!-- INI BUAT TOMBOL LOGIN -->
                        <!-- ======================================== -->

                        <button
                            type="submit"
                            class="btn btn-success w-100">

                            Login

                        </button>

                    </form>


                    <!-- ======================================== -->
                    <!-- INI BUAT TOMBOL KEMBALI KE FRONTEND -->
                    <!-- ======================================== -->

                    <a
                        href="{{ route('frontend') }}"
                        class="btn btn-secondary w-100 mt-2">

                        Kembali ke Frontend

                    </a>


                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
