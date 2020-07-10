/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 5.7.24 : Database - danadesa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`danadesa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `danadesa`;

/*Table structure for table `ref_dusun` */

DROP TABLE IF EXISTS `ref_dusun`;

CREATE TABLE `ref_dusun` (
  `id_dusun` int(10) NOT NULL AUTO_INCREMENT,
  `kode_dusun_bps` char(20) NOT NULL,
  `kode_dusun_kemendagri` char(20) NOT NULL,
  `nama_dusun` varchar(50) NOT NULL,
  `luas_wilayah` float NOT NULL,
  `nik_kepala` varchar(100) DEFAULT NULL,
  `nama_kepala` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_dusun`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `ref_dusun` */

insert  into `ref_dusun`(`id_dusun`,`kode_dusun_bps`,`kode_dusun_kemendagri`,`nama_dusun`,`luas_wilayah`,`nik_kepala`,`nama_kepala`) values 
(0,'0','0','Desa',9799,NULL,NULL),
(4,'3141242','243143','Dusun Krajan',3131,'8754756853','Muhaimin'),
(5,'31412421','0987654','Dusun Dukuh Utara',1113,'76959647965','Muhaimin'),
(6,'243423','78646312','Dusun Dukuh Selatan',3421,'84785787845','Muhaimin'),
(7,'123456','654321','Dusun Ngadirejo',2134,'84785787845','Muhaimin');

/*Table structure for table `tbl_apb_desa` */

DROP TABLE IF EXISTS `tbl_apb_desa`;

CREATE TABLE `tbl_apb_desa` (
  `id_apb_desa` int(10) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` varchar(50) DEFAULT NULL,
  `id_bank` varchar(50) DEFAULT NULL,
  `nomor` varchar(30) DEFAULT NULL,
  `nama_apb` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `uraian` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `anggaran` varchar(100) DEFAULT NULL,
  `tgl_apb_desa` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_apb_desa`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_apb_desa` */

insert  into `tbl_apb_desa`(`id_apb_desa`,`id_kegiatan`,`id_bank`,`nomor`,`nama_apb`,`tahun`,`kode`,`uraian`,`jumlah`,`satuan`,`harga`,`anggaran`,`tgl_apb_desa`) values 
(6,'1','3',NULL,'sd',2014,'0','121312434','21212','asas','990011','21212','14-07-2020');

/*Table structure for table `tbl_bank` */

DROP TABLE IF EXISTS `tbl_bank`;

CREATE TABLE `tbl_bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bank` */

insert  into `tbl_bank`(`id_bank`,`nama_bank`) values 
(1,'Bank BCA'),
(2,'Bank BRI'),
(3,'Bank BNI'),
(4,'Bank MANDIRI'),
(5,'Bank JATIM'),
(6,'Bank LAIN');

/*Table structure for table `tbl_belanja` */

DROP TABLE IF EXISTS `tbl_belanja`;

CREATE TABLE `tbl_belanja` (
  `id_belanja` int(10) NOT NULL AUTO_INCREMENT,
  `id_desa` int(10) DEFAULT NULL,
  `id_bidang_kegiatan` int(10) DEFAULT NULL,
  `anggaran` text,
  `anggaranpak` text,
  `jumlah` text,
  `jumlah_satuan` text,
  `harga_satuan` text,
  `sumber_dana` text,
  `nama_rek` text,
  `tgl_belanja` date DEFAULT NULL,
  PRIMARY KEY (`id_belanja`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_belanja` */

insert  into `tbl_belanja`(`id_belanja`,`id_desa`,`id_bidang_kegiatan`,`anggaran`,`anggaranpak`,`jumlah`,`jumlah_satuan`,`harga_satuan`,`sumber_dana`,`nama_rek`,`tgl_belanja`) values 
(2,1,11,'140000','60000','200000','23','10000','sdgd','sfdgfg','2017-09-21');

/*Table structure for table `tbl_bidang` */

DROP TABLE IF EXISTS `tbl_bidang`;

CREATE TABLE `tbl_bidang` (
  `id_bidang` int(10) NOT NULL AUTO_INCREMENT,
  `kode_bidang` varchar(20) DEFAULT NULL,
  `nama_bidang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bidang` */

insert  into `tbl_bidang`(`id_bidang`,`kode_bidang`,`nama_bidang`) values 
(11,'B002','Teknologi'),
(10,'B001','Kesehatan'),
(12,'B003','Hiburan'),
(13,'B004','ketrampilan');

/*Table structure for table `tbl_danadesa` */

DROP TABLE IF EXISTS `tbl_danadesa`;

CREATE TABLE `tbl_danadesa` (
  `id_danadesa` int(100) NOT NULL AUTO_INCREMENT,
  `tahun_danadesa` varchar(25) DEFAULT NULL,
  `id_rka_belanja` int(50) DEFAULT NULL,
  `id_rka_pendapatan` int(50) DEFAULT NULL,
  `dana_pemerintah` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id_danadesa`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_danadesa` */

insert  into `tbl_danadesa`(`id_danadesa`,`tahun_danadesa`,`id_rka_belanja`,`id_rka_pendapatan`,`dana_pemerintah`) values 
(1,'2020',10,NULL,NULL),
(2,'2019',NULL,4,NULL);

/*Table structure for table `tbl_detail` */

DROP TABLE IF EXISTS `tbl_detail`;

CREATE TABLE `tbl_detail` (
  `id_detail` int(100) NOT NULL AUTO_INCREMENT,
  `id_rka_belanja` int(11) NOT NULL,
  `tgl_detail` varchar(50) DEFAULT NULL,
  `keterangan_detail` varchar(75) DEFAULT NULL,
  `harga_detail` varchar(75) DEFAULT NULL,
  `nota_detail` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_detail` */

insert  into `tbl_detail`(`id_detail`,`id_rka_belanja`,`tgl_detail`,`keterangan_detail`,`harga_detail`,`nota_detail`) values 
(13,0,'0','0','','uploads/nota/20200702.jpg'),
(11,12,'2020-07-02','acdad','2000000','uploads/nota/2020070212.jpg'),
(10,13,'2020-07-02','Cadad','100000','uploads/nota/2020070213.jpg'),
(14,0,'0','0','','uploads/nota/20200702.jpg'),
(15,0,'0','0','','uploads/nota/20200703.jpg'),
(16,0,'0','0','','uploads/nota/20200703.jpg'),
(17,0,'0','0','','uploads/nota/20200703.jpg');

/*Table structure for table `tbl_detail_pendapatan` */

DROP TABLE IF EXISTS `tbl_detail_pendapatan`;

CREATE TABLE `tbl_detail_pendapatan` (
  `id_detail_p` int(100) NOT NULL AUTO_INCREMENT,
  `id_rka_pendapatan` int(50) DEFAULT NULL,
  `tgl_detail_p` varchar(50) DEFAULT NULL,
  `ket_detail_p` varchar(100) DEFAULT NULL,
  `harga_detail_p` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_detail_p`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_detail_pendapatan` */

insert  into `tbl_detail_pendapatan`(`id_detail_p`,`id_rka_pendapatan`,`tgl_detail_p`,`ket_detail_p`,`harga_detail_p`) values 
(1,5,'03-05-2020','Setoran','200000'),
(2,10,'03-07-2020','dsd','23232');

/*Table structure for table `tbl_kegiatan` */

DROP TABLE IF EXISTS `tbl_kegiatan`;

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kegiatan` varchar(20) DEFAULT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `nik_kegiatan` varchar(100) DEFAULT NULL,
  `alamat_kegiatan` varchar(200) DEFAULT NULL,
  `telp_kegiatan` varchar(50) DEFAULT NULL,
  `user_kegiatan` varchar(50) DEFAULT NULL,
  `pass_kegiatan` varchar(100) DEFAULT NULL,
  `foto_ketua` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kegiatan` */

insert  into `tbl_kegiatan`(`id_kegiatan`,`kode_kegiatan`,`nama_kegiatan`,`nik_kegiatan`,`alamat_kegiatan`,`telp_kegiatan`,`user_kegiatan`,`pass_kegiatan`,`foto_ketua`) values 
(1,'K001','Chanan FM','3506094536170004','Dusun Ngadirejo RT 008 RW 029','085632789654','chanan@gmail.com','user','uploads/haker.jpg'),
(5,'K002','Nicho','896859479569','Ngadiluwih - RT.009/RW.012','6858468568','nicho@gmail.com','1234567890','uploads/nico.jpg'),
(6,'K003','Chanan','123','Pace- RT.009/RW.019','098765234567','chan@gmail.com','12345','uploads/mimin.jpg'),
(7,'K004','Faro','656587577','Ngadiluwih - RT.009/RW.012','87587678968','faro@gmail.com','12345','uploads/pp.jpg');

/*Table structure for table `tbl_logo` */

DROP TABLE IF EXISTS `tbl_logo`;

CREATE TABLE `tbl_logo` (
  `id_logo` int(11) NOT NULL AUTO_INCREMENT,
  `konten_logo_desa` varchar(50) NOT NULL,
  `konten_logo_kabupaten` varchar(50) NOT NULL,
  `path_css` varchar(50) NOT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_logo` */

insert  into `tbl_logo`(`id_logo`,`konten_logo_desa`,`konten_logo_kabupaten`,`path_css`) values 
(1,'uploads/logonew.png','uploads/logonew.png','assetku/css/style.css');

/*Table structure for table `tbl_pelaksanaan` */

DROP TABLE IF EXISTS `tbl_pelaksanaan`;

CREATE TABLE `tbl_pelaksanaan` (
  `id_pelaksanaan` int(10) NOT NULL AUTO_INCREMENT,
  `id_rka_belanja` int(10) DEFAULT NULL,
  `jml_tim` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pelaksanaan`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pelaksanaan` */

insert  into `tbl_pelaksanaan`(`id_pelaksanaan`,`id_rka_belanja`,`jml_tim`) values 
(17,10,'30'),
(16,6,'90');

/*Table structure for table `tbl_pengguna` */

DROP TABLE IF EXISTS `tbl_pengguna`;

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(10) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_pengguna`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pengguna` */

insert  into `tbl_pengguna`(`id_pengguna`,`nik`,`nama_pengguna`,`password`,`nama`,`no_telepon`,`role`,`foto`,`is_delete`) values 
(6,'','bendahara','827ccb0eea8a706c4c34a16891f84e7b','','','Administrator','','Y'),
(1,'','admin','62f7dec74b78ba0398e6a9f317f55126','','','Pengelola Data','','Y'),
(2,'','sidekaadmin','admin123','','','Administrator','','Y'),
(3,'','sidekapengelola','c4ca4238a0b923820dcc509a6f75849b','','','Pengelola Data','','Y'),
(4,'','Chanan','0192023a7bbd73250516f069df18b500','','','Administrator','','N');

/*Table structure for table `tbl_program` */

DROP TABLE IF EXISTS `tbl_program`;

CREATE TABLE `tbl_program` (
  `id_program` int(10) NOT NULL AUTO_INCREMENT,
  `kode_program` varchar(20) DEFAULT NULL,
  `nama_program` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_program`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_program` */

insert  into `tbl_program`(`id_program`,`kode_program`,`nama_program`) values 
(3,'P001','Pemerintahan'),
(4,'P002','Masyarakat'),
(5,'P003','desa');

/*Table structure for table `tbl_raperdes` */

DROP TABLE IF EXISTS `tbl_raperdes`;

CREATE TABLE `tbl_raperdes` (
  `id_raperdes` int(10) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(10) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `ditetapkan_tgl` varchar(20) DEFAULT NULL,
  `uraian` text,
  `jumlah` varchar(100) DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `anggaran` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `tgl_raperdes` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_raperdes`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_raperdes` */

insert  into `tbl_raperdes`(`id_raperdes`,`nomor`,`tahun`,`ditetapkan_tgl`,`uraian`,`jumlah`,`satuan`,`harga`,`anggaran`,`keterangan`,`tgl_raperdes`) values 
(1,'001',2017,'16-01-2018','dfsdf1','100','sak','1000000','1000000','asfdf','16-01-2018');

/*Table structure for table `tbl_rka_belanja` */

DROP TABLE IF EXISTS `tbl_rka_belanja`;

CREATE TABLE `tbl_rka_belanja` (
  `id_rka_belanja` int(10) NOT NULL AUTO_INCREMENT,
  `id_bidang` int(10) DEFAULT NULL,
  `id_program` int(10) DEFAULT NULL,
  `id_kegiatan` int(10) DEFAULT NULL,
  `id_dusun` int(10) DEFAULT NULL,
  `tahun` varchar(70) DEFAULT NULL,
  `pelaksana_kegiatan` text,
  `anggaran` varchar(100) DEFAULT NULL,
  `tgl_rka_belanja` varchar(10) DEFAULT NULL,
  `selesai` varchar(10) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_rka_belanja`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_rka_belanja` */

insert  into `tbl_rka_belanja`(`id_rka_belanja`,`id_bidang`,`id_program`,`id_kegiatan`,`id_dusun`,`tahun`,`pelaksana_kegiatan`,`anggaran`,`tgl_rka_belanja`,`selesai`,`image`) values 
(6,10,3,1,0,'2020','Pencegahan Cor','5000000','12-12-2022','12-01-2023','uploads/6.jpg'),
(7,10,4,6,5,'2020','Pencegahan corona','5000000','09-04-2020','12-06-2020','uploads/7.jpg'),
(9,12,4,5,6,'2020','Jaranan Full Sebulan','12000000','14-04-2020','11-06-2020','uploads/9.jpg'),
(8,12,4,6,5,'2019','Konser Music ft. Makhluq Ghoib','1000000','10-04-2020','01-06-2020','uploads/8.jpg'),
(10,11,4,5,0,'2018','Pemasangan Internet','4000000','14-04-2020','12-06-2020','uploads/10.jpg'),
(11,10,3,7,4,'2019','Covid 19','11000000','21-04-2020','01-05-2020','uploads/11.jpg'),
(12,10,4,6,7,'2020','covid19','7000000','15-06-2020','15-06-2020','uploads/12.jpg'),
(13,12,4,1,0,'2019','jj','100000','02-07-2020','12-07-2020','uploads/13.jpg');

/*Table structure for table `tbl_rka_pendapatan` */

DROP TABLE IF EXISTS `tbl_rka_pendapatan`;

CREATE TABLE `tbl_rka_pendapatan` (
  `id_rka_pendapatan` int(10) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(100) DEFAULT NULL,
  `id_kegiatan` varchar(50) DEFAULT NULL,
  `kelompok` varchar(100) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `lokasi_kegiatan` text,
  `jumlah` varchar(100) DEFAULT NULL,
  `tgl_pembahasan` varchar(10) DEFAULT NULL,
  `tgl_rka_pendapatan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_rka_pendapatan`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_rka_pendapatan` */

insert  into `tbl_rka_pendapatan`(`id_rka_pendapatan`,`tahun`,`id_kegiatan`,`kelompok`,`jenis`,`lokasi_kegiatan`,`jumlah`,`tgl_pembahasan`,`tgl_rka_pendapatan`) values 
(4,'2017','7','Perangkat Desa','Iuran bhhh','Rumah RW','800000','03-05-2020','13-06-2020'),
(5,'2019','6','Dusun Ngadirejo RT 008','Pertunjukan Wayang Kulit','Lapangan Desa','1200000','15-04-2020','14-04-2020'),
(0,'2019','7','RW.010 RT.039','Iuran kekeye','Rumah Pak Carik','1100000','29-06-2020',NULL),
(7,'2020','6','RW.018 RT.021','THR','Masjid','1100000','16-06-2020',NULL),
(8,'2019','6','Pamong Desa','KKKK','DADad','2000000','18-07-2020',NULL),
(9,'2020','1','RW.008 RT.029','Iuran Bulanan','dfsdfsd','400000','09-07-2020',NULL),
(10,'2019','7','RW.008 RT.029','Iuran Dadakan','ccca','1222000','01-07-2020',NULL);

/*Table structure for table `tbl_slider_beranda` */

DROP TABLE IF EXISTS `tbl_slider_beranda`;

CREATE TABLE `tbl_slider_beranda` (
  `id_slider_beranda` int(11) NOT NULL AUTO_INCREMENT,
  `konten_background` varchar(100) NOT NULL,
  `konten_logo` varchar(100) NOT NULL,
  `konten_teks` varchar(100) NOT NULL,
  PRIMARY KEY (`id_slider_beranda`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_slider_beranda` */

insert  into `tbl_slider_beranda`(`id_slider_beranda`,`konten_background`,`konten_logo`,`konten_teks`) values 
(1,'uploads/web/slider_beranda/background_1d9.jpg','uploads/logonew.png','DanaDesa Dukuh'),
(2,'uploads/web/slider_beranda/background_355.jpg','uploads/web/slider_beranda/logo_355.png','DanaDesa Dukuh');

/*Table structure for table `tbl_spp` */

DROP TABLE IF EXISTS `tbl_spp`;

CREATE TABLE `tbl_spp` (
  `id_spp` int(10) NOT NULL AUTO_INCREMENT,
  `tgl` varchar(10) DEFAULT NULL,
  `id_bidang` int(10) DEFAULT NULL,
  `id_kegiatan` int(10) DEFAULT NULL,
  `pemasukkan` varchar(100) DEFAULT NULL,
  `pencairan` varchar(100) DEFAULT NULL,
  `permintaan` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  `sisa_dana` varchar(100) DEFAULT NULL,
  `tgl_spp` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_spp`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_spp` */

insert  into `tbl_spp`(`id_spp`,`tgl`,`id_bidang`,`id_kegiatan`,`pemasukkan`,`pencairan`,`permintaan`,`jumlah`,`sisa_dana`,`tgl_spp`) values 
(3,'27-04-2020',10,1,'4000000','3500000','5000000','3500000','6000000','27-04-2020');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;