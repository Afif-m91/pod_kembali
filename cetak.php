<!DOCTYPE html>
<?php include 'config/koneksi.php'?>
<html>
<head>
	<title>Print STT</title>
</head>
<body>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;

}
</style>
 <?php $query=mysqli_query($connect,"select * from stt 
			  where kd_stt='".$_GET['id']."' ");
			  $data=mysqli_fetch_assoc($query)  
			  ?>
<p align="center">E-CONSIGMENT NOTE (e-connote)-DO/DN/PO : <?php echo $data['no_do'];?> </p>
<table style="width:100%">
  <tr>
    <th><img src="web/image/261218spl-logo.png" widht: height="80px" </th>
    <th align="center">PT. SINARMAS PELANGI
		<p>Jl. Tanah Tinggi Timur No.1 A Harapan Mulia Kemayoran</p>
		Telp. 021 426 8989 (Hunting)
		Website : www.spl.co.id
	
	</th>
	<th><?php echo $data['no_awb'];?> </th>
	<th>JUMLAH KOLI <p><?php echo $data['koli'];?> </p></th>
		
	<th>BERAT 
	<p></p>
	<p></p>
	<br>
	<br>
	</th>
  </tr>
  <tr>
    <td>Asal : <b> Jakarta</b></td>
	<td>Tujuan : <b><?php echo $data['kota'];?></b></td>
	<td>Area</b></td>
  </tr>
  <tr>
    <td>Pengirim : <?php echo $data ['pengirim'];?> </td>
	<td>Penerima : <?php echo $data ['penerima'];?> </td>
  </tr>
 <tr>
    <td>Alamat : <?php echo $data ['pengirim'];?> </td>
	 <td>Alamat : <?php echo $data ['alamat_penerima'];?> </td>
  </tr>
   <tr>
    <td>Tanggal : <?php echo $data ['tgl_kirim'];?>
		<p></p>
		<br>
		<br>
		<br>
	</td>
	
	 <td>Persetujuan Pengirim
		<p></p>
		<br>
		<br>
		<br>
	</td>
	<td>Tanggal Diterima
		<p></p>
		<br>
		<br>
		<br>
	</td>
	<tr>
    <td>Keterangan : </td>
	<td><?php echo $data ['keterangan'];?> </td>
  </tr>
  </tr>
</table>

			
	</p>
 
	<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
<meta name="csrf-token" content="g0rWKVARqcBdM4ag9O3bgY91PCYVeliFaFmR9DJK9UC0BpBdHVv_rzVwzsmnjrz5-jFdcmwvPcECA-iYdCGgdg==">
    <title></title>
    <link href="/web/assets/9d128494/css/bootstrap.css" rel="stylesheet">
<link href="/web/css/site.css" rel="stylesheet">
<script src="/web/assets/8d76e9d9/jquery.js"></script>     
    <style type="text/css">
      body {
        font-family: Roboto, arial; 
        font-size: 10px !important; 
       } 
    </style>
   <style type="text/css" media="print">
   @media print {
       body {
        font-family: Roboto,arial; 
        font-size: 10px !important; 
       }   
    body * {
        visibility: hidden;
         
    }
    #divname, #divname * {
        visibility: visible;
        
    }
    #divname {
        overflow: visible !important;
        float:none !important;
        position: fixed;
        left: 0px;
        top: 0px;
        display:block !important;
        height:500px !important;
        
    }
    /*p {
        page-break-before: always;
    }*/
}
.para {
      
    height:1000px;
}
</style>
 
 
    
</head>
<body>
     
    
<div style="width: 100%;" id="divname">
    <div id="InnerDiv" class="k-widget k-grid" data-role="grid"> 
  <?php $query=mysqli_query($connect,"select * from stt 
			  where kd_stt='".$_GET['id']."' ");
			  $data=mysqli_fetch_assoc($query)  
			  ?>
 <h5 style="margin-bottom:0 !important; margin-top:8px; text-align:center">E-CONSIGNMENT NOTE (e-connote) -  DO/DN/PO : <b> <?php echo $data['no_do'];?></b></h5>
 <table width="100%" cellpadding="0" cellspacing="0" border="0" >
        <tr>
            <td valign="top">
            <!-- left side -->    
              <table width="100%" style="padding:0 !important;" cellpadding="0" cellspacing="0">
                <tr>
                    <td>

                    <!-- SPL address -->    
                          <table width="100%" style="padding:0 !important;" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="width:70%">
                                        
                                        <table width="100%"  border="1" class="border-solid" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td colspan="2" style="height:75px;" valign="top">
                                                    
                                                    <table width="100%" style="margin:0px;">
                                                        <tr>
                                                            <td width="20%">
                                                           <img src="web/image/261218spl-logo.png" alt="" style="width:100px; height:auto; margin-left:10px">   
                                                            </td>
                                                            <td valign="top" style="text-align:center">
                                                                
                                                                <h5 style="margin-bottom:0 !important; margin-top:8px">PT. SINARMAS PELANGI</h5>
                                                                Jl. Tanah Tinggi Timur No. 1 A Harapan Mulia Kemayoran<br>
                                                                Telp : 021 426 8989(Hunting)<br>
                                                              
                                                                Website : www.spl.co.id<br>
                                                                
                                                                
                                                            </td>
                                                        </tr>
                                                    </table>    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="height:28px; padding-left: 5px;">
                                                    <!-- kota asal merujuk cabang pengirim -->

                                                    ASAL &nbsp;:&nbsp; <b>JAKARTA </b>
                                                </td>
                                                <td style="padding-left: 5px;">
                                                    TUJUAN  &nbsp;: &nbsp;<b><b><?php echo $data['kota'];?> </b>  </b>
                                                </td>
                                            </tr>
                                        </table> 

                                    </td>
                                    
                                    <td valign="top">

                                        <table width="100%" class="border-solid" border="1"   cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td valign="top" style="text-align: center; font-weight: 700;">
                                                    <h5 style="margin-top:1px;margin-bottom: 1px;">EXPRESS COURIER</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:75px; text-align: center; padding:3px;" valign="top">
                                                    
                                                                                                           
                                                       <center>
                                                            <div id="showBarcode1112649354" style="margin-top: 5px; margin-left: 10px"></div>
                                                       </center>
													<?php echo $data['no_awb'];?> 
                                                </td>
                                            </tr>
                                        </table> 

                                    </td>
                                </tr>
                            </table> 
 
                    </td>
                </tr>
                 <tr>
                     <td valign="top">
                         
                     <!-- delivery info  -->    
                          
                            <!-- table pengirim - penerima -->
                            <table width="100%"  border="1" class="border-solid" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="width:50%; padding-left: 10px;height:20px;">
                                        PENGIRIM &nbsp;:&nbsp; <b><?php echo $data['pengirim'];?> </b>
                                    </td>
                                    <td style="padding-left: 10px;height:20px;">
                                        PENERIMA &nbsp;:&nbsp; <b><b><?php echo $data['penerima'];?> </b></b>
                                    </td>
                                </tr>
                                 <tr>
                                    <td style="height:70px;padding-left: 10px;" valign="top">
                                        ALAMAT <br><!-- pengirim --> 
                                         <b><?php echo $data['alamat_pengirim'];?> </b>  
                                    </td>
                                    <td style="padding-left: 10px" valign="top">
                                        ALAMAT <br><!-- penerima --> 
                                         <b><?php echo $data['alamat_penerima'];?> </b>                                    </td>
                                </tr>
                            </table> 
                            <!-- end of table pengirim - penerima -->
                     
                     
                     </td>
                </tr>
                 <tr>
                     <td valign="top">
                     <!-- counter sign -->
                     
                        <table width="100%" style="padding:0 !important;" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="width:60%" valign="top">
                     
                     
                                        <table width="100%" cellpadding="0" cellspacing="0" style="max-height:100%">
                                <tr>
                                    <td>
                                        
                                        
                                        <table width="100%" border="1" class="border-solid"  cellpadding="0" cellspacing="0" style="max-height:100%">
                                            <tr>
                                                <td style="height:30px;width:30%;padding-left: 5px;" valign="top">
                                                    TGL  : 27/01/2020                                                    <div style="height:35px;"></div>
                                                    Nama : <b>ARDI SPL</b> 
                                                </td>
                                                <td  valign="top" style="padding-left: 5px;" >
                                                    PERSETUJUAN PENGIRIM
                                                    <div style="height:35px;"></div>
                                                    Nama : <b>RIZALI YCH</b>                                                </td>
                                                <td  valign="top" style="padding-left: 5px; width:45%;">
                                                    DITERIMA DGN BAIK<BR>TGL
                                                    <div style="height:25px;"></div>
                                                    TTD/NAMA/STEMPEL
                                                </td>
                                            </tr>
                                        </table>  

                                        <table width="100%" border="1" class="border-solid" cellpadding="0" cellspacing="0" style="max-height:100%">
                                            <tr>
                                                <td style="height:25px;width:35%;padding-left: 5px;" valign="top">
                                                    KETERANGAN :
                                                    <i><b>REGULER</b></i>
                                                </td>
             
                                            </tr>
                                        </table>  
                                        
                                        
                                    </td>
                                </tr>
                            </table>
                                        
                        </td>               
                        <td valign="top">
                           <!-- berat --> 
                               
                            
                        
                                   <table width="100%" border="1" class="border-solid" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td valign="top"  style="text-align: center; font-weight: 700; height:15px; padding-top:2px;">
                                                     BERAT VOLUME                                                     
                                                </td>
                                            </tr>
                                              <tr>
                                                  <td valign="top" style="height:20px;text-align: center;padding-top:1px;">
                                                      
                                                                                                            <u>(P)0 X (L)0 X (T) 0 </u> = 1 Kg<br>
                                                      6000                                     
                                                </td>
                                            </tr>
                                              <tr>
                                                <td valign="top" style="text-align: center; height:10px;padding-top: 1px;">
                                                     ISI MENURUT PENGAKUAN                                                     
                                                </td>
                                            </tr>
                                               <tr>
                                                <td valign="top" style="text-align:left; height:21px; padding: 2px;">
                                                    <b><?php echo $data['jenis_barang'];?>  </b>                                                  
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="text-align: center;">

                                                    <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td>DIPERIKSA</td>
                                                            <td><input type="checkbox" name="DP"></td>
                                                            <td>TDK DIPERIKSA</td>
                                                            <td><input type="checkbox" name="TDP"></td>
                                                             
                                                        </tr>
                                                    </table>                                                     
                                                </td>
                                            </tr>
                                        </table> 
  
                        </td>                  
                      </tr>                   
                    </table>                    
 
                     </td>
                </tr>
              </table>
 
            </td>  
            <td width="25%" valign="top">
                
                
            <!-- right side -->
                    <table width="100%" border="1" class="border-solid" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="text-align: center; font-weight: 800;width:50%; height:20px;">JUMLAH KOLI</td>
                            <td style="text-align: center; font-weight: 800">BERAT</td>
                        </tr>
                        <tr>
                            <td style="height:20px; text-align: center;">1</td>
                            <td style="text-align: center;">1</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left:5px;height:15px;">AREA</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left:5px;text-align: center;font-weight:800; height:20px">SPL SERVICE</td>
                        </tr>
                         <tr>
                             <td colspan="2">

                                  <table width="100%"   cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td valign="top">
                                           <input type="checkbox" name="rs" value="0">                                        </td>
                                        <td><div style="font-weight:800">RS</div></td>
                                        <td valign="top">
                                           <input type="checkbox" name="ods" value="0">                                        </td>
                                        <td><div style="font-weight:800">ODS</div></td>
                                        <td valign="top">
                                            <input type="checkbox" name="sds" value="0">                                        </td>
                                        <td><div style="font-weight:800">SDS</div></td>
                                    </tr>
                                  </table>   

                             </td>
                        </tr>

                        <tr>
                            <td style="text-align: center; font-weight: 700;width:50%;height: 20px;">JENIS KIRIMAN</td>
                            <td style="text-align: center; font-weight: 700">CHARGES</td>
                        </tr>

                        <tr>
                            <td>
                                                                    <input type="checkbox" name="dok"> 
                                    
                                DOKUMEN
                            </td>
                            <td>
                                <div style="text-align:right;margin-right: 10px;">
                                   
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                                                    <input type="checkbox" name="paket"> 
                                  
                                
                                PAKET
                            </td>
                            <td>
                                <div style="text-align:right;margin-right: 10px;">
                                   
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                                                    <input type="checkbox" name="paket"> 
                                 
                                ASURANSI
                            </td>
                            <td><div style="text-align:right;margin-right: 10px;"></div></td>
                        </tr>
                        <tr>
                            <td>
                                                                      <input type="checkbox" name="paket"> 
                                  
                                PACKING
                            </td>
                            <td><div style="text-align:right;margin-right: 10px;"></div></td>
                        </tr>
                        <tr>
                            <td>
                                
                                                                    <input type="checkbox" name="vol"> 
                                  
                                VOLUME
                            </td>
                            <td>
                                 <div style="text-align:right;margin-right: 10px;">
                                   
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="rs"> PPN</td>
                            <td><div style="text-align:right;margin-right: 10px;"></div></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; font-weight: 700;width:50%;height:18px;"><h5 style="margin-top:1px;margin-bottom: 1px">TOTAL</h5></td>
                            <td style="text-align: center; font-weight: 700">
                                <div style="text-align:right;margin-right: 10px;font-size: 14px;">
                                    0                                </div>
                            </td>
                        </tr>
                        <tr>
                             <td colspan="2" style="text-align: center; font-weight:800;height:29px;">JENIS PEMBAYARAN</td>
                        </tr>
                         <tr>
                             <td colspan="2">


                                <table width="100%" class="border-solid" cellpadding="0" cellspacing="0">
                                    <tr>
                                        
                                        <td>
                                          <input type="checkbox" name="rs">
										</td>
                                        <td style="padding-left:5px !important;">TUNAI</td>
                                        <td><input type="checkbox" name="rs"></td>
                                        <td>KREDIT</td>
                                        <td>
                                           <input type="checkbox" name="tunai" checked>                                            
                                        </td>
                                        <td>TRANSFER</td>
                                        <td><input type="checkbox" name="rs"></td>
                                        <td>COD</td>
                                        
                                    </tr>
                                </table> 

                             </td>
                        </tr>
                    </table> 
                   <!-- end right side -->         
               
               
            </td>  
        </tr>
    </table>   
 
  <div style='font-size:10px;font-style: italic'>Print by <?php echo $data['kd_user'];?> print time 28/01/2020 10:45:08 -   <span class="text-blue">LEMBAR UNTUK PENAGIHAN</span> </div> <hr style="margin-top:1px;margin-bottom:1px;border-top: 2px dotted black">
 
 
	<script>
		window.print();
	</script>
	
</body>
</html>