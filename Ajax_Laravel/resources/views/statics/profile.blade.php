<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body>
@extends('layouts.application')
@include('shared.head_nav')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Imam Fahmi Fadillah</h3>
            <img class="img-circle" src="/assets/img/imam.jpg" alt="Generic placeholder image" width="200" height="200">
        </div><!-- /.col-lg-4 -->
        <div class="col-md-8">
            <!-- Table -->
            <table class="table">
                <tr>
                    <td><b>Nama</b></td>
                    <td>Imam Fahmi Fadillah</td>
                </tr>
                <tr>
                    <td><b>Tempat, Tanggal Lahir</b></td>
                    <td>Subang, 29 Desember 1993</td>
                </tr>
                <tr>
                    <td><b>Jenis Kelamin</b></td>
                    <td>Laki-laki</td>
                </tr>
                <tr>
                    <td><b>Alamat Domisili</b></td>
                    <td>Jl. Cibiru Hilir no.23</td>
                </tr>
            </table>
        </div><!-- /.col-lg-8 -->
    </div><!-- /.row -->
</div>
</body>
</html>