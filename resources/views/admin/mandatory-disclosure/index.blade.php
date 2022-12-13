@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">Mandatory Disclosure</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-mandatory-disclosure','role' => 'form', 'class'=>'', 'id' => 'submitForm','files' => true ]) !!}

                    <input type="hidden" id="disclosure_id" name="disclosure_id" class="form-control" value="{{$mandatoryDisclosureData->id ?? ''}}">

                    <div class="form-group">
                        <label for="description" class="text-bold">Disclosure Content <span class="required-fields">*</span></label>
                        <textarea class="form-control" name="description" id="description" required data-msg-required="Disclosure content field is required.">{{$mandatoryDisclosureData->description ?? ''}}</textarea>
                        <span class="validation-errors"></span>
                    </div>

                    <div class="form-group">
                        <label for="dled_md_format" class="text-bold">Disclosure Format for D.EL.ED.</label>
                        <input type="file" class="form-control" name="dled_md_format" id="dled_md_format" data-msg-required="Please select a file.">
                        <span class="validation-errors"></span>
                    </div>
                    @if(!empty($mandatoryDisclosureData->dled_md_format))
                        <div class="form-group">
                            <a href="{{ URL::asset($mandatoryDisclosureData->dled_md_format) }}" target="_blank"><i class="icon-download"></i> Check uploaded file</a>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="bed_md_format" class="text-bold">Disclosure Format for B.ED.</label>
                        <input type="file" class="form-control" name="bed_md_format" id="bed_md_format" data-msg-required="Please select a file.">
                        <span class="validation-errors"></span>
                    </div>
                    @if(!empty($mandatoryDisclosureData->bed_md_format))
                        <div class="form-group">
                            <a href="{{ URL::asset($mandatoryDisclosureData->bed_md_format) }}" target="_blank"><i class="icon-download"></i> Check uploaded file</a>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="balance_sheet" class="text-bold">Balance Sheet</label>
                        <input type="file" class="form-control" name="balance_sheet" id="balance_sheet" data-msg-required="Please select a file.">
                        <span class="validation-errors"></span>
                    </div>
                    @if(!empty($mandatoryDisclosureData->balance_sheet))
                        <div class="form-group">
                            <a href="{{ URL::asset($mandatoryDisclosureData->balance_sheet) }}" target="_blank"><i class="icon-download"></i> Check uploaded file</a>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="income_and_expenditure" class="text-bold">Income & Expenditure</label>
                        <input type="file" class="form-control" name="income_and_expenditure" id="income_and_expenditure" data-msg-required="Please select a file.">
                        <span class="validation-errors"></span>
                    </div>
                    @if(!empty($mandatoryDisclosureData->income_and_expenditure))
                        <div class="form-group">
                            <a href="{{ URL::asset($mandatoryDisclosureData->income_and_expenditure) }}" target="_blank"><i class="icon-download"></i> Check uploaded file</a>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="receipt_payment" class="text-bold">Receipt & Payment</label>
                        <input type="file" class="form-control" name="receipt_payment" id="receipt_payment" data-msg-required="Please select a file.">
                        <span class="validation-errors"></span>
                    </div>
                    @if(!empty($mandatoryDisclosureData->receipt_payment))
                        <div class="form-group">
                            <a href="{{ URL::asset($mandatoryDisclosureData->receipt_payment) }}" target="_blank"><i class="icon-download"></i> Check uploaded file</a>
                        </div>
                    @endif

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')

    <link href="{{ URL::asset('assets/admin/js/jquery-validation/jquery-validate.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>

    <script src="//cdn.tiny.cloud/1/5lrxjaz6k4182tsdt4ftj6ezr145iiaejnw9nrannsilrejn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            tinymce.init({
                selector: 'textarea.form-control',
                plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen link template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount textpattern noneditable help charmap quickbars emoticons',
                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | template link anchor codesample | ltr rtl',
                menubar: 'file edit view insert format tools table help',
                toolbar_sticky: true,
                toolbar_mode: 'sliding',
                height: 300,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quicktable',
                contextmenu: 'link table',
            });

            $('#submitForm').validate({
                ignore: [],
                errorPlacement: function errorPlacement(error, element) {
                    $(element).parents('div.form-group').find('span.validation-errors').append(error);
                },
                onfocusout: false,
                highlight: function (element, errorClass) {
                    if ($(element).hasClass('select-2')) {
                        $(element).next('.select2-container').addClass(errorClass);
                    } else {
                        $(element).addClass(errorClass);
                    }
                },
                unhighlight: function (element, errorClass) {
                    if ($(element).hasClass('select-2')) {
                        $(element).next('.select2-container').removeClass(errorClass);
                    } else {
                        $(element).removeClass(errorClass);
                    }
                },
            });
        })
    </script>
@endsection
