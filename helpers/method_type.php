<?php

//  seluruh jenis metode pengiriman data yang dikirimkan oleh server
    function post(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST' ){
            reponse_not_found();
            exit();
        }
    }
    function get(){
        if($_SERVER['REQUEST_METHOD'] !== 'GET' ){
            reponse_not_found();
            exit();
        }
    }

    function delete(){
        if($_SERVER['REQUEST_METHOD'] !== 'DELETE' ){
            reponse_not_found();
            exit();
        }
    }
