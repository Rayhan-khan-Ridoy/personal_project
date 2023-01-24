@extends('common.layout')
@section('container')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create
                                        Account</h3></div>
                                <div class="card-body">
                                    <form action="" id="frmRegistration">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="inputName" id="inputName" type="text"
                                                   placeholder="Swapnil"/>
                                            <label for="inputName">Name</label>
                                            <span id="inputName_error" class="field_error"></span></br>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="inputEmail" id="inputEmail" type="email"
                                                   placeholder="name@example.com"/>
                                            <label for="inputEmail">Email address</label>
                                            <span id="inputEmail_error" class="field_error"></span></br>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="inputMobile" id="inputMobile" type="text"
                                                   placeholder="Mobile"/>
                                            <label for="inputMobile">Mobile</label>
                                            <span id="inputMobile_error" class="field_error"></span></br>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="inputPassword" id="inputPassword" type="password"
                                                   placeholder="password"/>
                                            <label for="inputPassword">Password</label>
                                            <span id="inputPssword_error" class="field_error"></span></br>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <button type="submit" id="btnRegistration" class="btn btn-info">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div  id="thank_you_msg"class="reg_success">
                                </div>

                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.html">Have an account? Go to login</a></div>
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
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script type="text/javascript">


    </script>
@endsection
