@extends('layouts.admin-template')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Change Password</h3>
            <div class="heading-elements"></div>
        </div>
        <div class="panel-body">
            <form id="changePasswordForm" class="mt-5">
                <div class="form-group">
                    <label for="old_password" class="text-bold">Old Password</label>
                    <input type="text" class="form-control" name="old_password" id="old_password" data-msg-required="Please provide your old password.">
                </div>
                <div class="form-group">
                    <label for="new_password" class="text-bold">New Password</label>
                    <input type="text" class="form-control" name="new_password" id="new_password" data-msg-required="Please provide your new password.">
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="text-bold">Confirm Password</label>
                    <input type="text" class="form-control" name="confirm_password" id="confirm_password" data-msg-required="Please provide your new password.">
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('footer_script')
@endsection
