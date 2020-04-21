<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Fungsi ubah format tanggal
if ( !function_exists('format_tanggal') ) {
	
	function format_tanggal($tgl){
		if (!empty($tgl)) {
			$pecah = explode('-', $tgl);
			$hasil = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];

			return $hasil;
		}
	}

}


// Fungsi format angka ke rupiah
if ( !function_exists('format_rupiah') ) {

    function format_rupiah($angka){
        $rupiah = number_format($angka,0,',','.');
        return $rupiah;
    }

}

// Fungsi ubah format tanggal Indonesia
if ( !function_exists('format_tanggal_indo') ) {
	
	function format_tanggal_indo($tgllengkap){
		if (!empty($tgllengkap)) {
			$pecah = explode(' ', $tgllengkap);
			$tanggal = $pecah[0];
			$jam = $pecah[1];

			$BulanIndo = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
			$tahun = substr($tanggal, 0, 4);
			$bulan = substr($tanggal, 5, 2);
			$tgl   = substr($tanggal, 8, 2);
 
			$hasil = $tgl.' '.$BulanIndo[(int)$bulan].' '.$tahun.', '.$jam;

			return $hasil;
		}
	}

}


// Fungsi ID Admin
if ( !function_exists('cek_id_admin') ) {

    function cek_id_admin($id_admin_num){
        $num = substr($id_admin_num, 0,2);
        $num2 = substr($id_admin_num, 0,1);

        //Jika Satuan
        if ($num=='00'){
        	$id_admin = substr($id_admin_num, 2,1);
        	$id = $id_admin+1;
        }else{
        	//Jika Ratusan
        	if (!$num2=='0') {
        		$id = $id_admin_num+1;
        	}else{
        		//Jika Puluhan
        		$id_admin = substr($id_admin_num, 1,2);
        		$id = $id_admin+1;
        	}
        }

        return $id;
    }
}

// Fungsi ID Admin
if ( !function_exists('id_admin') ) {

    function id_admin($id_admin){
        $panjangid = strlen($id_admin);
        if ($panjangid==1) {
        	$idadmin = 'ADM-00'.$id_admin;
        }
        else if ($panjangid==2) {
            $idadmin = 'ADM-0'.$id_admin;
        }
        else {
    	    $idadmin = 'ADM-'.$id_admin;
        }
        return $idadmin;
    }
}


// Fungsi ID User
if ( !function_exists('cek_id_user') ) {

    function cek_id_user($id_user_num){
        $num = substr($id_user_num, 0,2);
        $num2 = substr($id_user_num, 0,1);

        //Jika Satuan
        if ($num=='00'){
            $id_user = substr($id_user_num, 2,1);
            $id = $id_user+1;
        }else{
            //Jika Ratusan
            if (!$num2=='0') {
                $id = $id_user_num+1;
            }else{
                //Jika Puluhan
                $id_user = substr($id_user_num, 1,2);
                $id = $id_user+1;
            }
        }

        return $id;
    }
}

// Fungsi ID User
if ( !function_exists('id_user') ) {

    function id_user($id_user){
        $panjangid = strlen($id_user);
        if ($panjangid==1) {
            $iduser = 'USER-00'.$id_user;
        }
        else if ($panjangid==2) {
            $iduser = 'USER-0'.$id_user;
        }
        else {
            $idauser = 'USER-'.$id_user;
        }
        return $iduser;
    }
}


// Fungsi ID Kategori
if ( !function_exists('cek_id_kategori') ) {

    function cek_id_kategori($id_kategori_num){
        $num = substr($id_kategori_num, 0,2);
        $num2 = substr($id_kategori_num, 0,1);

        //Jika Satuan
        if ($num=='00'){
            $id_kategori = substr($id_kategori_num, 2,1);
            $id = $id_kategori+1;
        }else{
            //Jika Ratusan
            if (!$num2=='0') {
                $id = $id_kategori_num+1;
            }else{
                //Jika Puluhan
                $id_kategori = substr($id_kategori_num, 1,2);
                $id = $id_kategori+1;
            }
        }

        return $id;
    }
}

// Fungsi ID Kategori
if ( !function_exists('id_kategori') ) {

    function id_kategori($id_kategori){
        $panjangid = strlen($id_kategori);
        if ($panjangid==1) {
            $idkategori = 'KTG-00'.$id_kategori;
        }
        else if ($panjangid==2) {
            $idkategori = 'KTG-0'.$id_kategori;
        }
        else {
            $idkategori = 'KTG-'.$id_kategori;
        }
        return $idkategori;
    }
}


// Fungsi ID Produk
if ( !function_exists('cek_id_produk') ) {

    function cek_id_produk($id_produk_num){
        $num = substr($id_produk_num, 0,2);
        $num2 = substr($id_produk_num, 0,1);

        //Jika Satuan
        if ($num=='00'){
            $id_produk = substr($id_produk_num, 2,1);
            $id = $id_produk+1;
        }else{
            //Jika Ratusan
            if (!$num2=='0') {
                $id = $id_produk_num+1;
            }else{
                //Jika Puluhan
                $id_produk = substr($id_produk_num, 1,2);
                $id = $id_produk+1;
            }
        }

        return $id;
    }
}

// Fungsi Produk
if ( !function_exists('id_produk') ) {

    function id_produk($id_produk){
        $panjangid = strlen($id_produk);
        if ($panjangid==1) {
            $idproduk = 'SHP-00'.$id_produk;
        }
        else if ($panjangid==2) {
            $idproduk = 'SHP-0'.$id_produk;
        }
        else {
            $idproduk = 'SHP-'.$id_produk;
        }
        return $idproduk;
    }
}

// Fungsi ID Produk
if ( !function_exists('phone_indo') ) {

    function phone_indo($telepon){
        $cek_tlp = substr($telepon, 0,1);
        if ($cek_tlp=='0') {
            $tlp = substr($telepon, 1);
            $phone = '62'.$tlp;
        }else{
            $phone = $telepon;
        } 

        return $phone;
    }
}         


// Fungsi ID bank
if ( !function_exists('cek_id_bank') ) {

    function cek_id_bank($id_bank_num){
        $num = substr($id_bank_num, 0,2);
        $num2 = substr($id_bank_num, 0,1);

        //Jika Satuan
        if ($num=='00'){
            $id_bank = substr($id_bank_num, 2,1);
            $id = $id_bank+1;
        }else{
            //Jika Ratusan
            if (!$num2=='0') {
                $id = $id_bank_num+1;
            }else{
                //Jika Puluhan
                $id_bank = substr($id_bank_num, 1,2);
                $id = $id_bank+1;
            }
        }

        return $id;
    }
}

// Fungsi bank
if ( !function_exists('id_bank') ) {

    function id_bank($id_bank){
        $panjangid = strlen($id_bank);
        if ($panjangid==1) {
            $idbank = 'BANK-00'.$id_bank;
        }
        else if ($panjangid==2) {
            $idbank = 'BANK-0'.$id_bank;
        }
        else {
            $idbank = 'BANK-'.$id_bank;
        }
        return $idbank;
    }
}   



// Fungsi ID bank
if ( !function_exists('cek_id_checkout') ) {

    function cek_id_checkout($id_checkout_num){
        $num = substr($id_checkout_num, 0,2);
        $num2 = substr($id_checkout_num, 0,1);

        //Jika Satuan
        if ($num=='00'){
            $id_bank = substr($id_checkout_num, 2,1);
            $id = $id_bank+1;
        }else{
            //Jika Ratusan
            if (!$num2=='0') {
                $id = $id_checkout_num+1;
            }else{
                //Jika Puluhan
                $id_bank = substr($id_checkout_num, 1,2);
                $id = $id_bank+1;
            }
        }

        return $id;
    }
}

// Fungsi checkout
if ( !function_exists('id_checkout') ) {

    function id_checkout($id_checkout){
        $panjangid = strlen($id_checkout);
        if ($panjangid==1) {
            $idcheckout = 'CHK-00'.$id_checkout;
        }
        else if ($panjangid==2) {
            $idcheckout = 'CHK-0'.$id_checkout;
        }
        else {
            $idcheckout = 'CHK-'.$id_checkout;
        }
        return $idcheckout;
    }
}   