@extends('admin.layouts.master')

@section('style')

@endsection

@section('page_icon')<i class="feather icon-home"></i>@endsection

@section('page_title') Intake Forms @endsection

@section('content')

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>Which style do you like?</h5>
        </div>
        <div class="card-body">
            <h5 class="mt-3">I like</h5>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Style1(Default)</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Style2</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline3">Style3</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline4">Style4</label>
            </div>
            <button type="button" class="btn btn-success check-btn" id="toastr-change" style="display: none;">Save</button>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-success text-white">
            <h5>Style1</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" id="name" placeholder="Username" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected="">select</option>
                            <option>Large select</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">Check me out</label>
                    </div>
                </div>
                <button type="submit" class="btn  btn-primary">Sign in</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-info text-white">
            <h5>Style2</h5>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate="">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required="">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Last name</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required="">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustomUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required="">
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">City</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="City" required="">
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">State</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="State" required="">
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Zip</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required="">
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
                        <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
                <button class="btn  btn-primary" type="submit">Submit form</button>
            </form>
            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields

            </script>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-warning text-white">
            <h5>Style3</h5>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate="">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">First name</label>
                        <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="Mark" required="">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Last name</label>
                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required="">
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                            </div>
                            <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required="">
                            <div class="invalid-tooltip">
                                Please choose a unique and valid username.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">City</label>
                        <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required="">
                        <div class="invalid-tooltip">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip04">State</label>
                        <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required="">
                        <div class="invalid-tooltip">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip05">Zip</label>
                        <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required="">
                        <div class="invalid-tooltip">
                            Please provide a valid zip.
                        </div>
                    </div>
                </div>
                <button class="btn  btn-primary" type="submit">Submit form</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-danger text-white">
            <h5>Style4</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000" maxlength="10" required>
                            <span class="font-13 text-muted">e.g "DD/MM/YYYY"</span>
                        </div>
                        <div class="form-group">
                            <label>Hour</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00:00:00" maxlength="8" required>
                            <span class="font-13 text-muted">e.g "HH:MM:SS"</span>
                        </div>
                        <div class="form-group">
                            <label>Date &amp; Hour</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000 00:00:00" maxlength="19" required>
                            <span class="font-13 text-muted">e.g "DD/MM/YYYY HH:MM:SS"</span>
                        </div>
                        <div class="form-group">
                            <label>ZIP Code</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00000-000" maxlength="9" required>
                            <span class="font-13 text-muted">e.g "xxxxx-xxx"</span>
                        </div>
                        <div class="form-group">
                            <label>Crazy Zip Code</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="0-00-00-00" maxlength="10" required>
                            <span class="font-13 text-muted">e.g "x-xx-xx-xx"</span>
                        </div>
                        <div class="form-group">
                            <label>Money</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true" maxlength="22" required>
                            <span class="font-13 text-muted">e.g "Your money"</span>
                        </div>
                        <div class="form-group">
                            <label>Money 2</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="#.##0,00" data-reverse="true">
                            <span class="font-13 text-muted">e.g "#.##0,00"</span>
                        </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="0000-0000" maxlength="9" required>
                            <span class="font-13 text-muted">e.g "xxxx-xxxx"</span>
                        </div>
                        <div class="form-group">
                            <label>Telephone with Code Area</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(00) 0000-0000" maxlength="14" required>
                            <span class="font-13 text-muted">e.g "(xx) xxxx-xxxx"</span>
                        </div>
                        <div class="form-group">
                            <label>US Telephone</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(000) 000-0000" maxlength="14" required>
                            <span class="font-13 text-muted">e.g "(xxx) xxx-xxxx"</span>
                        </div>
                        <div class="form-group">
                            <label>São Paulo Celphones</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="(00) 00000-0000" maxlength="15" required>
                            <span class="font-13 text-muted">e.g "(xx) xxxxx-xxxx"</span>
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000-00" data-reverse="true" maxlength="14" required>
                            <span class="font-13 text-muted">e.g "xxx.xxx.xxxx-xx"</span>
                        </div>
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00.000.000/0000-00" data-reverse="true" maxlength="18" required>
                            <span class="font-13 text-muted">e.g "xx.xxx.xxx/xxxx-xx"</span>
                        </div>
                        <div class="form-group">
                            <label>IP Address</label>
                            <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="099.099.099.099" data-reverse="true" maxlength="15" required>
                            <span class="font-13 text-muted">e.g "xxx.xxx.xxx.xxx"</span>
                        </div>
                        <input class="btn  btn-primary float-right" type="submit" value="Submit form">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection

@section('demo_script')
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script>
        $(".custom-control-input").click(function(){
            $(".check-btn").css("display", "initial");
        });
    </script>
@endsection

