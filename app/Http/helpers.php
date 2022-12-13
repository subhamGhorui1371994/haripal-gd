<?php

use Illuminate\Support\Facades\Session;

/**
 * @return void
 */
function showMessage()
{
    if (Session::has('errors')) {

        $error = Session::get('errors')->First();
        Session::forget('errors');

        echo "<div class='alert alert-danger alert-styled-left alert-bordered'>
				<button type='button' class='close' data-dismiss='alert'><span>×</span><span class='sr-only'>Close</span></button>
				<span class='text-semibold'>$error</span>
        </div>";

    } elseif (Session::has('success')) {

        $success = Session::get('success');
        Session::forget('success');

        echo "<div class='alert alert-success alert-styled-left alert-arrow-left alert-bordered'>
				<button type='button' class='close' data-dismiss='alert'><span>×</span><span class='sr-only'>Close</span></button>
			    <span class='text-semibold'>$success</span>
        </div>";

    } else {
        echo '';
    }
}

/**
 * Get admin logged in session data
 * @param string $type
 * @return array|mixed
 */
function get_admin_session($type = 'auth')
{
    $session = Session::get('admin');

    if (isset($session[$type])) {
        return $session[$type];
    } else {
        return empty($session) ? [] : $session;
    }
}

/**
 * Generate breadcrumb row html
 * @param $pageTitle
 * @param $pageName
 * @return void
 */
function get_breadcrumb_row_html($pageTitle = '', $pageName = '')
{
    echo '<div class="inner-page-banner-area" style="background-image: url(' . URL::asset('assets/img/breadcrumb.jpg') . ');">
    <div class="container">
        <div class="pagination-area">
            <h1 class="text-uppercase">' . $pageTitle . '</h1>
            <ul class="text-uppercase">
                <li><a href="' . url('/') . '">Home</a> -</li>
                <li>' . $pageName . '</li>
            </ul>
        </div>
    </div>
</div>';
}

/**
 * @param $filePath
 * @param $alt
 * @return mixed|string
 */
function checkAndRenderImage($filePath = '', $alt = '') {
    if(!empty($filePath) && file_exists(public_path($filePath))) {
        return $filePath;
    } else {
        return $alt;
    }
}
