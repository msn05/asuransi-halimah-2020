 <?php 
 $head = '
 <head>
 <style>
 /** 
 Set the margins of the page to 0, so the footer and the header
 can be of the full height and width !
                **/
 @page {
    margin: 0cm 0cm;
}

/** Define now the real margins of every page in the PDF **/
body {
    margin-top: 0cm;
    margin-left: 2cm;
    margin-right: 2cm;
    margin-bottom: 0cm;
}
.customers {
  font-family: Arial, Helvetica, sans-serif;
  font-size:10px;
  border-collapse: collapse;
  width: 100%;
}
.besarDepan {
    text-transform:capitalize;
}
.customers td, #customers th {
  border: 2px solid #ddd;
  padding: 5px;
}


.customers th {
  padding-left:10px;
  padding-top: 6px;
  padding-bottom: 6px;
  padding-right:10px;
  text-align: left;
  border:2px solid #ddd;

}
/** Define the header rules **/
header {
    position: fixed;
    text-transform: uppercase;

}

.header img {
 float: left;
 padding-left: 3cm;
 padding-top : 0.4cm;
}
.header p {
 position : absolute;
 padding-left : 6cm;
 text-align:center;
 letter-spacing: 5px;
 font-size : 20px;
}

.uppercase {
    text-transform : uppercase;
    font-weight: bold;
}
.titik_rata {
    padding-left : 50px;
}
.rata_kiri p {
    padding-left: 5px;
}


main .surat-jenis {
    margin-top : 3cm;
    text-transform : uppercase;
    text-decoration: underline;
    text-decoration-style: double;
}
main img {
    padding-top : 0.2cm;
    float : right;
}
main .ttd {
    text-align:right;
}

.border-bottom{
    margin-top : 2.5cm;
    border-bottom : 6px double black;
}

.border {
    border-bottom : 2px solid black;
}
.text-center{
    text-align: center;
}
.paragraf {
 text-align:justify;  
 text-justify:initial;
 margin-top:1cm;
 word-spacing: 3px;
 font-size:18px;
}
/** Define the footer rules **/
footer {
    position: fixed; 
    bottom: 0cm; 
    left: 2cm; 
    right: 0cm;
    height: 2cm;
    color:blue;
    font-style: italic;
}
</style>
</head>
<body>
<header>
<div class="header">
<img src="../../apps/logo-cv.png" width="100px" height=80px">
<p class="uppercase"> BENGKEL MOBIL 
<br>	TIARA PERSADA AUTOMOTIVE
<br> <span style="font-size:9px;">Jalan Bambang Utoyo No.35 Palembang <br> telp : 0711-8840-800</span>
</p>
</div>
</header>
<br>
<p class="border-bottom"></p>

<!-- Wrap the content of your PDF inside a main tag -->


';
