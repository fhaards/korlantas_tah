<?php

function isLogin()
{
    $ci = &get_instance();
    return $ci->session->level != null;
}

function isUser()
{
    $ci = &get_instance();
    return $ci->session->level == 'user';
}

function isAdmin()
{
    $ci = &get_instance();
    return $ci->session->level == 'admin';
}

function isSuperAdmin()
{
    $ci = &get_instance();
    return $ci->session->level == 'superadmin';
}

function show404IfNotAdmin()
{
    if (!isAdmin()) {
        redirect('error404');
    }
}

function redirectIfNotLogin()
{
    $ci = &get_instance();
    if ($ci->session->userdata('status') != "login") {
        redirect(base_url(""));
    }
}

function redirectIfSuperadmin()
{
    $ci = &get_instance();
    if ($ci->session->userdata('level') == "superadmin") {
        return show_404();
    }
}

function getUserData()
{
    $ci = &get_instance();
    $ci->load->model('modelUser');
    return $ci->modelUser->findBy('username', $ci->session->username);
}

function getUserAccount()
{
    $ci = &get_instance();
    $ci->load->model('modelUser');
    return $ci->modelUser->findByUserAccount('user_id', $ci->session->userid);
}

function setDate($getDates)
{
    return date('D , d F Y', strtotime($getDates));
}

function setTimeDate($getDates)
{
    return date('d F Y - H:i', strtotime($getDates));
}
