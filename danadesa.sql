/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : danadesa

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 05/08/2020 22:33:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ref_dusun
-- ----------------------------
DROP TABLE IF EXISTS `ref_dusun`;
CREATE TABLE `ref_dusun`  (
  `id_dusun` int(10) NOT NULL AUTO_INCREMENT,
  `kode_dusun_bps` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_dusun_kemendagri` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_dusun` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `luas_wilayah` float NOT NULL,
  `nik_kepala` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_kepala` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_dusun`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_dusun
-- ----------------------------
INSERT INTO `ref_dusun` VALUES (0, '0', '0', 'Desa', 9799, NULL, NULL);
INSERT INTO `ref_dusun` VALUES (4, '3141242', '243143', 'Dusun Krajan', 3131, '8754756853', 'Muhaimin');
INSERT INTO `ref_dusun` VALUES (5, '31412421', '0987654', 'Dusun Dukuh Utara', 1113, '76959647965', 'Muhaimin');
INSERT INTO `ref_dusun` VALUES (6, '243423', '78646312', 'Dusun Dukuh Selatan', 3421, '84785787845', 'Muhaimin');
INSERT INTO `ref_dusun` VALUES (7, '123456', '654321', 'Dusun Ngadirejo', 2134, '84785787845', 'Muhaimin');

-- ----------------------------
-- Table structure for tbl_apb_desa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_apb_desa`;
CREATE TABLE `tbl_apb_desa`  (
  `id_apb_desa` int(10) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_bank` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_apb` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` year NULL DEFAULT NULL,
  `kode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uraian` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `anggaran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_apb_desa` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `potoh` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_apb_desa`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_apb_desa
-- ----------------------------
INSERT INTO `tbl_apb_desa` VALUES (8, '6', '1', NULL, 'Jual Sawah Desa', 2019, '0', '765437347', '2 Hektar', 'malek', '34000000', '35000000', '18-07-2019', NULL);
INSERT INTO `tbl_apb_desa` VALUES (11, '6', NULL, NULL, 'jual padi', 2020, NULL, '0', '10 ton', NULL, NULL, '40000000', '04-08-2020', NULL);

-- ----------------------------
-- Table structure for tbl_bank
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bank`;
CREATE TABLE `tbl_bank`  (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_bank`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_bank
-- ----------------------------
INSERT INTO `tbl_bank` VALUES (1, 'Bank BCA');
INSERT INTO `tbl_bank` VALUES (2, 'Bank BRI');
INSERT INTO `tbl_bank` VALUES (3, 'Bank BNI');
INSERT INTO `tbl_bank` VALUES (4, 'Bank MANDIRI');
INSERT INTO `tbl_bank` VALUES (5, 'Bank JATIM');
INSERT INTO `tbl_bank` VALUES (6, 'Bank LAIN');

-- ----------------------------
-- Table structure for tbl_belanja
-- ----------------------------
DROP TABLE IF EXISTS `tbl_belanja`;
CREATE TABLE `tbl_belanja`  (
  `id_belanja` int(10) NOT NULL AUTO_INCREMENT,
  `id_desa` int(10) NULL DEFAULT NULL,
  `id_bidang_kegiatan` int(10) NULL DEFAULT NULL,
  `anggaran` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `anggaranpak` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `jumlah` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `jumlah_satuan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `harga_satuan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `sumber_dana` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `nama_rek` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tgl_belanja` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_belanja`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_belanja
-- ----------------------------
INSERT INTO `tbl_belanja` VALUES (2, 1, 11, '140000', '60000', '200000', '23', '10000', 'sdgd', 'sfdgfg', '2017-09-21');

-- ----------------------------
-- Table structure for tbl_bidang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bidang`;
CREATE TABLE `tbl_bidang`  (
  `id_bidang` int(10) NOT NULL AUTO_INCREMENT,
  `kode_bidang` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bidang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_bidang`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_bidang
-- ----------------------------
INSERT INTO `tbl_bidang` VALUES (11, 'B002', 'Teknologi');
INSERT INTO `tbl_bidang` VALUES (10, 'B001', 'Kesehatan');
INSERT INTO `tbl_bidang` VALUES (12, 'B003', 'Hiburan');
INSERT INTO `tbl_bidang` VALUES (14, 'B004', 'Seni');
INSERT INTO `tbl_bidang` VALUES (15, 'B005', 'Elektronik');

-- ----------------------------
-- Table structure for tbl_danadesa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_danadesa`;
CREATE TABLE `tbl_danadesa`  (
  `id_danadesa` int(100) NOT NULL AUTO_INCREMENT,
  `tahun_danadesa` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_rka_belanja` int(50) NULL DEFAULT NULL,
  `id_rka_pendapatan` int(50) NULL DEFAULT NULL,
  `dana_pemerintah` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_danadesa`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_danadesa
-- ----------------------------
INSERT INTO `tbl_danadesa` VALUES (1, '2020', 10, NULL, NULL);
INSERT INTO `tbl_danadesa` VALUES (2, '2019', NULL, 4, NULL);

-- ----------------------------
-- Table structure for tbl_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detail`;
CREATE TABLE `tbl_detail`  (
  `id_detail` int(100) NOT NULL AUTO_INCREMENT,
  `id_rka_belanja` int(11) NOT NULL,
  `tgl_detail` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan_detail` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_detail` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nota_detail` varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 47 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detail
-- ----------------------------
INSERT INTO `tbl_detail` VALUES (32, 15, '2020-07-21', 'Beli batu', '1000000', 'uploads/nota/2020072115.jpg');
INSERT INTO `tbl_detail` VALUES (10, 12, '2020-07-02', 'Cadad', '100000', 'uploads/nota/2020070213.jpg');
INSERT INTO `tbl_detail` VALUES (22, 14, '2020-07-15', 'kkkxxm', '90000', 'uploads/nota/2020071514.jpg');
INSERT INTO `tbl_detail` VALUES (21, 14, '2020-07-15', 'mmmdsa', '2000000', 'uploads/nota/2020071514.jpg');
INSERT INTO `tbl_detail` VALUES (33, 16, '2020-07-22', 'sewa sound', '1000000', 'uploads/nota/2020072216.jpg');
INSERT INTO `tbl_detail` VALUES (27, 7, '2020-07-16', 'Masker', '50000', 'uploads/detail/20200718030726Chanan.jpg');
INSERT INTO `tbl_detail` VALUES (30, 7, '2020-08-08', 'Sarung Tangan', '3300000', 'uploads/detail/202007180307437.jpg');
INSERT INTO `tbl_detail` VALUES (34, 17, '2020-07-23', 'Sound', '5000000', 'uploads/detail/2020072203075317.jpg');
INSERT INTO `tbl_detail` VALUES (35, 17, '2020-07-04', 'Sewa Panggung', '6000000', 'uploads/detail/2020072203070017.jpg');
INSERT INTO `tbl_detail` VALUES (39, 7, '2020-08-03', 'kuplok', '550000', 'uploads/detail/202008031208467.jpg');
INSERT INTO `tbl_detail` VALUES (46, 7, '2020-08-06', 'Semen', '1100000', 'uploads/detail/202008050808557.jpg');
INSERT INTO `tbl_detail` VALUES (42, 8, '2020-08-06', 'tyt', '1000000', 'uploads/detail/202008040208448.jpg');

-- ----------------------------
-- Table structure for tbl_detail_pendapatan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detail_pendapatan`;
CREATE TABLE `tbl_detail_pendapatan`  (
  `id_detail_p` int(100) NOT NULL AUTO_INCREMENT,
  `id_rka_pendapatan` int(50) NULL DEFAULT NULL,
  `tgl_detail_p` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket_detail_p` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_detail_p` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto_p` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail_p`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detail_pendapatan
-- ----------------------------
INSERT INTO `tbl_detail_pendapatan` VALUES (1, 5, '2020-08-11', 'Setoran Bulanan', '200000', 'uploads/foto/20200718030719Chanan.jpg');
INSERT INTO `tbl_detail_pendapatan` VALUES (3, 10, '2020-07-18', 'Sabun', '21321', 'uploads/foto/20200718.jpg');
INSERT INTO `tbl_detail_pendapatan` VALUES (6, 5, '2020-07-18', 'Uang Parkir Pasar', '200000', 'uploads/foto/20200718030718.jpg');
INSERT INTO `tbl_detail_pendapatan` VALUES (9, 12, '21-07-2020', 'hasil lomba', '1000000', 'uploads/foto/2020072112.jpg');

-- ----------------------------
-- Table structure for tbl_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kegiatan`;
CREATE TABLE `tbl_kegiatan`  (
  `id_kegiatan` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kegiatan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_kegiatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nik_kegiatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_kegiatan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pass_kegiatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto_ketua` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_kegiatan
-- ----------------------------
INSERT INTO `tbl_kegiatan` VALUES (1, 'K001', 'Chanan FM', '3506094536170004', 'Dusun Ngadirejo RT 008 RW 029', '085632789654', 'chanan@gmail.com', 'user', 'uploads/haker.jpg');
INSERT INTO `tbl_kegiatan` VALUES (5, 'K002', 'Nicho', '896859479569', 'Ngadiluwih - RT.009/RW.012', '6858468568', 'nicho@gmail.com', '1234567890', 'uploads/nico.jpg');
INSERT INTO `tbl_kegiatan` VALUES (6, 'K003', 'Chanan', '3506041702990023', 'Pace- RT.009/RW.019', '098765234567', 'chan@gmail.com', '12345', 'uploads/3506041702990023.jpg');
INSERT INTO `tbl_kegiatan` VALUES (7, 'K004', 'Faro', '656587577', 'Ngadiluwih - RT.009/RW.012', '87587678968', 'faro@gmail.com', '12345', 'uploads/pp.jpg');
INSERT INTO `tbl_kegiatan` VALUES (9, 'K005', 'hafizd', '99999999234', 'kediri', '081238391339', 'hafizd@gmail.com', '12345', 'uploads/99999999234.jpg');

-- ----------------------------
-- Table structure for tbl_logo
-- ----------------------------
DROP TABLE IF EXISTS `tbl_logo`;
CREATE TABLE `tbl_logo`  (
  `id_logo` int(11) NOT NULL AUTO_INCREMENT,
  `konten_logo_desa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `konten_logo_kabupaten` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `path_css` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_logo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_logo
-- ----------------------------
INSERT INTO `tbl_logo` VALUES (1, 'uploads/logonew.png', 'uploads/logonew.png', 'assetku/css/style.css');

-- ----------------------------
-- Table structure for tbl_pelaksanaan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pelaksanaan`;
CREATE TABLE `tbl_pelaksanaan`  (
  `id_pelaksanaan` int(10) NOT NULL AUTO_INCREMENT,
  `id_rka_belanja` int(10) NULL DEFAULT NULL,
  `jml_tim` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelaksanaan`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pelaksanaan
-- ----------------------------
INSERT INTO `tbl_pelaksanaan` VALUES (17, 10, '30');
INSERT INTO `tbl_pelaksanaan` VALUES (16, 6, '90');

-- ----------------------------
-- Table structure for tbl_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pengguna`;
CREATE TABLE `tbl_pengguna`  (
  `id_pengguna` int(10) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pengguna` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telepon` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_delete` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_pengguna`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pengguna
-- ----------------------------
INSERT INTO `tbl_pengguna` VALUES (6, '', 'bendahara', '827ccb0eea8a706c4c34a16891f84e7b', '', '', 'Administrator', '', 'Y');
INSERT INTO `tbl_pengguna` VALUES (1, '', 'admin', '62f7dec74b78ba0398e6a9f317f55126', '', '', 'Pengelola Data', '', 'Y');
INSERT INTO `tbl_pengguna` VALUES (2, '', 'sidekaadmin', 'admin123', '', '', 'Administrator', '', 'Y');
INSERT INTO `tbl_pengguna` VALUES (3, '', 'sidekapengelola', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'Pengelola Data', '', 'Y');
INSERT INTO `tbl_pengguna` VALUES (4, '', 'Chanan', '0192023a7bbd73250516f069df18b500', '', '', 'Administrator', '', 'N');

-- ----------------------------
-- Table structure for tbl_program
-- ----------------------------
DROP TABLE IF EXISTS `tbl_program`;
CREATE TABLE `tbl_program`  (
  `id_program` int(10) NOT NULL AUTO_INCREMENT,
  `kode_program` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_program` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_program`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_program
-- ----------------------------
INSERT INTO `tbl_program` VALUES (3, 'P001', 'Pemerintahan');
INSERT INTO `tbl_program` VALUES (4, 'P002', 'Masyarakat');
INSERT INTO `tbl_program` VALUES (6, 'P003', 'Desa');
INSERT INTO `tbl_program` VALUES (7, 'P004', 'Masyarakat seni');

-- ----------------------------
-- Table structure for tbl_raperdes
-- ----------------------------
DROP TABLE IF EXISTS `tbl_raperdes`;
CREATE TABLE `tbl_raperdes`  (
  `id_raperdes` int(10) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` year NULL DEFAULT NULL,
  `ditetapkan_tgl` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uraian` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `jumlah` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `anggaran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tgl_raperdes` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_raperdes`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_raperdes
-- ----------------------------
INSERT INTO `tbl_raperdes` VALUES (1, '001', 2017, '16-01-2018', 'dfsdf1', '100', 'sak', '1000000', '1000000', 'asfdf', '16-01-2018');

-- ----------------------------
-- Table structure for tbl_rka_belanja
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rka_belanja`;
CREATE TABLE `tbl_rka_belanja`  (
  `id_rka_belanja` int(10) NOT NULL AUTO_INCREMENT,
  `id_bidang` int(10) NULL DEFAULT NULL,
  `id_program` int(10) NULL DEFAULT NULL,
  `id_kegiatan` int(10) NULL DEFAULT NULL,
  `id_dusun` int(10) NULL DEFAULT NULL,
  `tahun` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pelaksana_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `anggaran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_rka_belanja` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `selesai` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rka_belanja`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_rka_belanja
-- ----------------------------
INSERT INTO `tbl_rka_belanja` VALUES (6, 10, 3, 1, 0, '2020', 'Pencegahan Cor', '5000000', '12-12-2022', '12-01-2023', 'uploads/PencegahanCor12-12-2022.jpg');
INSERT INTO `tbl_rka_belanja` VALUES (7, 10, 4, 6, 5, '2020', 'Pencegahan corona', '5000000', '09-04-2020', '12-06-2020', 'uploads/Pencegahancorona09-04-2020.jpg');
INSERT INTO `tbl_rka_belanja` VALUES (9, 12, 4, 5, 6, '2020', 'Jaranan Full Sebulan', '12000000', '14-04-2020', '11-06-2020', 'uploads/JarananFullSebulan14-04-2020.jpg');
INSERT INTO `tbl_rka_belanja` VALUES (8, 12, 4, 6, 5, '2019', 'Konser Music ft. Makhluq Ghoib', '1000000', '10-04-2020', '01-06-2020', 'uploads/KonserMusicft.MakhluqGhoib10-04-2020.jpg');
INSERT INTO `tbl_rka_belanja` VALUES (10, 11, 4, 5, 0, '2018', 'Pemasangan Internet', '4000000', '14-04-2020', '12-06-2020', 'uploads/PemasanganInternet14-04-2020.jpg');
INSERT INTO `tbl_rka_belanja` VALUES (12, 10, 4, 6, 7, '2020', 'covid19', '7000000', '15-06-2020', '15-06-2020', 'uploads/covid1915-06-2020.jpg');
INSERT INTO `tbl_rka_belanja` VALUES (14, 10, 3, 6, 5, '2018', 'Dpd', '3000000', '14-07-2020', '14-07-2020', 'uploads/Dpd14-07-2020.jpg');
INSERT INTO `tbl_rka_belanja` VALUES (19, 15, 7, 6, 5, '2020', 'bangun masjid', '50000000', '05-08-2020', '30-09-2020', 'uploads/bangunmasjid05-08-2020.jpg');

-- ----------------------------
-- Table structure for tbl_rka_pendapatan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rka_pendapatan`;
CREATE TABLE `tbl_rka_pendapatan`  (
  `id_rka_pendapatan` int(10) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelompok` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lokasi_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `jumlah` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_pembahasan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_rka_pendapatan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `poto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rka_pendapatan`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_rka_pendapatan
-- ----------------------------
INSERT INTO `tbl_rka_pendapatan` VALUES (13, '2019', '5', 'Rt.01 Rt.30', 'Pendapatan Dari Pemerintah', 'fdfd', '1000000000', '03-08-2020', '26-08-2020', 'uploads/pendapatan/fdfd03-08-2020.jpg');
INSERT INTO `tbl_rka_pendapatan` VALUES (5, '2018', '6', 'Dusun Ngadirejo RT 008', 'Pertunjukan Wayang Kulit', 'Lapangan Desa', '1200000', '15-04-2020', '14-04-2020', 'uploads/pendapatan/LapanganDesa15-04-2020.jpg');
INSERT INTO `tbl_rka_pendapatan` VALUES (12, '2019', '6', 'Rt.01 Rt.30', 'lomba agustusan', 'lapangan desa', '5000000', '21-07-2020', '31-07-2020', 'uploads/pendapatan/lapangandesa21-07-2020.jpg');
INSERT INTO `tbl_rka_pendapatan` VALUES (7, '2019', '6', 'RW.018 RT.021', 'THR', 'Masjid', '1100000', '16-06-2020', '03-08-2020', 'uploads/pendapatan/Masjid16-06-2020.jpg');
INSERT INTO `tbl_rka_pendapatan` VALUES (8, '2020', '6', 'Pamong Desa', 'KKKK', 'DADad', '2000000', '18-07-2020', '03-08-2020', 'uploads/pendapatan/DADad18-07-2020.jpg');
INSERT INTO `tbl_rka_pendapatan` VALUES (9, '2018', '1', 'RW.008 RT.029', 'Iuran Bulanan', 'dfsdfsd', '400000', '09-07-2020', '03-08-2020', 'uploads/pendapatan/dfsdfsd09-07-2020.jpg');
INSERT INTO `tbl_rka_pendapatan` VALUES (10, '2020', '7', 'RW.008 RT.029', 'Iuran Dadakan', 'ccca', '1222000', '01-07-2020', '03-08-2020', 'uploads/pendapatan/ccca01-07-2020.jpg');
INSERT INTO `tbl_rka_pendapatan` VALUES (11, '2019', '6', 'Rt.21 Rw.4', 'Roda Dua', 'perkarangan', '9000000', '15-07-2020', '22-09-2020', 'uploads/pendapatan/perkarangan15-07-2020.jpg');
INSERT INTO `tbl_rka_pendapatan` VALUES (14, '2020', '6', 'Rt.01 Rt.30', 'Kegiatan wayang', 'lapangan desa', '10000000', '05-08-2020', '26-08-2020', 'uploads/pendapatan/lapangandesa05-08-2020.jpg');

-- ----------------------------
-- Table structure for tbl_slider_beranda
-- ----------------------------
DROP TABLE IF EXISTS `tbl_slider_beranda`;
CREATE TABLE `tbl_slider_beranda`  (
  `id_slider_beranda` int(11) NOT NULL AUTO_INCREMENT,
  `konten_background` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `konten_logo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `konten_teks` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_slider_beranda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_slider_beranda
-- ----------------------------
INSERT INTO `tbl_slider_beranda` VALUES (1, 'uploads/web/slider_beranda/background_1d9.jpg', 'uploads/logonew.png', 'DanaDesa Dukuh');
INSERT INTO `tbl_slider_beranda` VALUES (2, 'uploads/web/slider_beranda/background_355.jpg', 'uploads/web/slider_beranda/logo_355.png', 'DanaDesa Dukuh');

-- ----------------------------
-- Table structure for tbl_spp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_spp`;
CREATE TABLE `tbl_spp`  (
  `id_spp` int(10) NOT NULL AUTO_INCREMENT,
  `tgl` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_bidang` int(10) NULL DEFAULT NULL,
  `id_kegiatan` int(10) NULL DEFAULT NULL,
  `pemasukkan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pencairan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `permintaan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sisa_dana` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_spp` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_spp`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_spp
-- ----------------------------
INSERT INTO `tbl_spp` VALUES (3, '27-04-2020', 10, 1, '4000000', '3500000', '5000000', '3500000', '6000000', '27-04-2020');

SET FOREIGN_KEY_CHECKS = 1;
