<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Menejemen Berita</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    @if (Session::get('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ Session::get('error') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (Session::get('success'))
                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <strong>{{ Session::get('success') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <form action="{{ route('login.store') }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('username') is-invalid @enderror"
                                                id="inputUsername" name="username" type="text" placeholder="admin..."
                                                value="{{ old('username') }}" />
                                            <label for="inputUsername">Username</label>
                                            @error('username')
                                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                id="inputPassword" type="password" placeholder="Password"
                                                name="password" />
                                            <label for="inputPassword">Password</label>
                                            @error('password')
                                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="remember" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember
                                                Me</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
