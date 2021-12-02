#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nmuser` varchar(99) DEFAULT NULL,
  `nmlogin` varchar(99) DEFAULT NULL,
  `pslogin` varchar(99) DEFAULT NULL,
  `notelp` varchar(99) DEFAULT NULL,
  `level` varchar(99) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `idtoko` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `nmuser`, `nmlogin`, `pslogin`, `notelp`, `level`, `status`, `idtoko`) VALUES (1, 'Administator', 'admin', '7363a0d0604902af7b70b271a0b96480', '082376585519', '1', '1', '1');
INSERT INTO `admin` (`id`, `nmuser`, `nmlogin`, `pslogin`, `notelp`, `level`, `status`, `idtoko`) VALUES (35, 'dua', 'dua', '7363a0d0604902af7b70b271a0b96480', '-', '1', '1', '2');


#
# TABLE STRUCTURE FOR: barang
#

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode` varchar(200) DEFAULT NULL,
  `nama` varchar(99) DEFAULT NULL,
  `kategori` varchar(99) DEFAULT NULL,
  `modal` varchar(99) DEFAULT '0',
  `jual` varchar(99) DEFAULT '0',
  `stok` varchar(99) DEFAULT '0',
  `gudang` varchar(99) DEFAULT NULL,
  `posisi` varchar(99) DEFAULT NULL,
  `ket` varchar(99) DEFAULT NULL,
  `satuan` varchar(500) DEFAULT NULL,
  `d1` varchar(99) DEFAULT NULL,
  `d2` varchar(99) DEFAULT NULL,
  `d3` varchar(99) DEFAULT NULL,
  `s_tambah` varchar(99) DEFAULT NULL,
  `s_kurang` varchar(99) DEFAULT NULL,
  `waktu` varchar(99) DEFAULT NULL,
  `foto` varchar(99) DEFAULT NULL,
  `toko` varchar(99) DEFAULT NULL,
  `bersih` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `barang` (`id`, `kode`, `nama`, `kategori`, `modal`, `jual`, `stok`, `gudang`, `posisi`, `ket`, `satuan`, `d1`, `d2`, `d3`, `s_tambah`, `s_kurang`, `waktu`, `foto`, `toko`, `bersih`) VALUES (1, 'kode', 'nama', 'acc', '100.00', '200.00', '5', '5', '', '', 'pcs', '', '', '', '10', '0', '2020-11-02 02:43:40', '', '1', '100');
INSERT INTO `barang` (`id`, `kode`, `nama`, `kategori`, `modal`, `jual`, `stok`, `gudang`, `posisi`, `ket`, `satuan`, `d1`, `d2`, `d3`, `s_tambah`, `s_kurang`, `waktu`, `foto`, `toko`, `bersih`) VALUES (2, 'kode', 'nama', 'acc', '100.00', '200.00', '90', '1', '', '', 'pcs', '', '', '', '15', '0', '2020-11-02 02:47:41', '', '1', '100');
INSERT INTO `barang` (`id`, `kode`, `nama`, `kategori`, `modal`, `jual`, `stok`, `gudang`, `posisi`, `ket`, `satuan`, `d1`, `d2`, `d3`, `s_tambah`, `s_kurang`, `waktu`, `foto`, `toko`, `bersih`) VALUES (3, 'BA001', 'Colokan', 'Alat Listrik', '10000.00', '18000.00', '5', '10', '', '', 'pcs', '', '', '', '10', '0', '2020-11-02 11:32:16', '', '2', '10000');
INSERT INTO `barang` (`id`, `kode`, `nama`, `kategori`, `modal`, `jual`, `stok`, `gudang`, `posisi`, `ket`, `satuan`, `d1`, `d2`, `d3`, `s_tambah`, `s_kurang`, `waktu`, `foto`, `toko`, `bersih`) VALUES (4, 'BA002', 'Kabel', 'Alat Listrik', '3000.00', '6000.00', '15', '10', '', '', 'meter', '', '', '', '15', '0', '2020-11-02 11:37:03', '', '2', '3000');


#
# TABLE STRUCTURE FOR: catatan
#

DROP TABLE IF EXISTS `catatan`;

CREATE TABLE `catatan` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idadmin` int(15) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `ket` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: gudang
#

DROP TABLE IF EXISTS `gudang`;

CREATE TABLE `gudang` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `gudang` varchar(99) DEFAULT NULL,
  `ket` varchar(99) DEFAULT NULL,
  `idtoko` varchar(99) DEFAULT NULL,
  `status` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `gudang` (`id`, `gudang`, `ket`, `idtoko`, `status`) VALUES (1, 'gudang 1', '-', '1', '1');
INSERT INTO `gudang` (`id`, `gudang`, `ket`, `idtoko`, `status`) VALUES (3, 'gudang 2', '-', '1', '1');
INSERT INTO `gudang` (`id`, `gudang`, `ket`, `idtoko`, `status`) VALUES (4, 'gudang 3', '-', '1', '1');
INSERT INTO `gudang` (`id`, `gudang`, `ket`, `idtoko`, `status`) VALUES (5, 'toko', '-', '1', '2');
INSERT INTO `gudang` (`id`, `gudang`, `ket`, `idtoko`, `status`) VALUES (10, 'ga', '-', '2', '1');
INSERT INTO `gudang` (`id`, `gudang`, `ket`, `idtoko`, `status`) VALUES (11, 'ta', '-', '2', '2');


#
# TABLE STRUCTURE FOR: info_barang
#

DROP TABLE IF EXISTS `info_barang`;

CREATE TABLE `info_barang` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `faktur` varchar(99) DEFAULT NULL,
  `supplier` varchar(99) DEFAULT NULL,
  `nomor` varchar(99) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `kode` varchar(99) DEFAULT NULL,
  `nama` varchar(99) DEFAULT NULL,
  `ket` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=600 DEFAULT CHARSET=utf8mb4;

INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (33, 'M20110200003', 'letty', '', '2020-11-02', 'BA001', 'Colokan', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (34, 'M20110200003', 'letty', '', '2020-11-02', 'BA001', 'Colokan', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (35, 'M20110200003', 'letty', '', '2020-11-02', 'BA001', 'Colokan', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (36, 'M20110200003', 'letty', '', '2020-11-02', 'BA001', 'Colokan', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (37, 'M20110200003', 'letty', '', '2020-11-02', 'BA001', 'Colokan', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (38, 'M20110200003', 'letty', '', '2020-11-02', 'BA001', 'Colokan', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (39, 'M20110200003', 'letty', '', '2020-11-02', 'BA001', 'Colokan', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (40, 'M20110200003', 'letty', '', '2020-11-02', 'BA001', 'Colokan', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (41, 'M20110200003', 'letty', '', '2020-11-02', 'BA001', 'Colokan', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (42, 'M20110200003', 'letty', '', '2020-11-02', 'BA001', 'Colokan', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (43, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (44, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (45, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (46, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (47, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (48, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (49, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (50, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (51, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (52, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (53, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (54, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (55, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (56, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (57, 'M20110200003', 'letty', '', '2020-11-02', 'BA002', 'Kabel', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (495, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (496, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (497, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (498, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (499, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (500, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (501, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (502, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (503, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (504, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (505, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (506, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (507, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (508, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (509, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (510, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (511, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (512, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (513, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (514, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (515, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (516, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (517, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (518, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (519, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (520, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (521, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (522, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (523, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (524, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (525, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (526, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (527, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (528, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (529, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (530, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (531, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (532, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (533, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (534, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (535, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (536, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (537, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (538, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (539, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (540, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (541, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (542, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (543, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (544, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (545, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (546, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (547, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (548, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (549, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (550, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (551, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (552, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (553, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (554, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (555, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (556, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (557, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (558, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (559, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (560, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (561, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (562, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (563, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (564, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (565, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (566, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (567, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (568, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (569, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (570, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (571, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (572, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (573, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (574, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (575, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (576, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (577, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (578, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (579, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (580, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (581, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (582, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (583, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (584, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (585, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (586, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (587, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (588, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (589, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (590, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (591, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (592, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (593, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (594, 'M20110200004', 'Vino Mandiri Perkasa', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (595, '2200001', 'Abadi Swalayan', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (596, '2200001', 'Abadi Swalayan', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (597, '2200001', 'Abadi Swalayan', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (598, '2200001', 'Abadi Swalayan', '', '2020-11-02', 'kode', 'nama', 'M');
INSERT INTO `info_barang` (`id`, `faktur`, `supplier`, `nomor`, `tgl`, `kode`, `nama`, `ket`) VALUES (599, '2200001', 'Abadi Swalayan', '', '2020-11-02', 'kode', 'nama', 'M');


#
# TABLE STRUCTURE FOR: kartu_stok
#

DROP TABLE IF EXISTS `kartu_stok`;

CREATE TABLE `kartu_stok` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode` varchar(99) DEFAULT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `jml` varchar(99) DEFAULT NULL,
  `masuk` varchar(99) DEFAULT NULL,
  `keluar` varchar(99) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: kategori
#

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nmkat` varchar(99) DEFAULT NULL,
  `idtoko` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `kategori` (`id`, `nmkat`, `idtoko`) VALUES (1, 'Kabel', '1');
INSERT INTO `kategori` (`id`, `nmkat`, `idtoko`) VALUES (2, 'test', '2');


#
# TABLE STRUCTURE FOR: keluar_masuk
#

DROP TABLE IF EXISTS `keluar_masuk`;

CREATE TABLE `keluar_masuk` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nofaktur` varchar(99) DEFAULT NULL,
  `idbarang` varchar(15) DEFAULT NULL,
  `idadmin` varchar(15) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `supplier` varchar(200) DEFAULT NULL,
  `stbayar` varchar(99) DEFAULT NULL,
  `jml` varchar(200) DEFAULT NULL,
  `modal` varchar(99) NOT NULL,
  `jual` varchar(99) NOT NULL,
  `nota` varchar(99) NOT NULL,
  `tbayar` date DEFAULT NULL,
  `idtoko` varchar(99) DEFAULT NULL,
  `d1` varchar(99) DEFAULT NULL,
  `d2` varchar(99) DEFAULT NULL,
  `d3` varchar(99) DEFAULT NULL,
  `gudang` varchar(99) DEFAULT NULL,
  `ket` varchar(99) DEFAULT NULL,
  `laba` varchar(99) DEFAULT NULL,
  `kode` varchar(99) DEFAULT NULL,
  `nama` varchar(99) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `masuk` varchar(99) DEFAULT NULL,
  `keluar` varchar(99) DEFAULT NULL,
  `total` varchar(99) DEFAULT NULL,
  `sales` varchar(99) DEFAULT NULL,
  `sebelum` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (41, 'MV20110200001', '2', '1_Administator', '2020-11-02', '5', 'Cash', '10', '100.00', '200.00', 'move  1 Ke 5 masuk', '0000-00-00', '1', '', '', '', '5', 'M', '0', 'kode', 'nama', '2020-11-02 13:47:13', '10', '0', '100', 'sales', '0');
INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (39, 'MV20110200001', '1', '1_Administator', '2020-11-02', '1', 'Cash', '10', '100.00', '200.00', 'move  5 Ke 1 masuk', '0000-00-00', '1', '', '', '', '1', 'M', '0', 'kode', 'nama', '2020-11-02 13:33:58', '10', '0', '100', 'sales', '90');
INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (38, 'MV20110200001', '1', '1_Administator', '2020-11-02', '5', 'Cash', '10', '100.00', '200.00', 'move 5 Ke 1 keluar', '0000-00-00', '1', '', '', '', '5', 'K', '0', 'kode', 'nama', '2020-11-02 13:33:58', '0', '10', '100', 'sales', '10');
INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (6, 'M20110200003', '3', '35_dua', '2020-11-02', 'letty', 'Hutang', '10', '10000.00', '18000.00', 'FA00001', '0000-00-00', '2', '', '', '', '10', 'M', '0', 'BA001', 'Colokan', '2020-11-02 11:32:16', '10', '0', '100000', 'sales', '0');
INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (7, 'M20110200003', '4', '35_dua', '2020-11-02', 'letty', 'Hutang', '15', '3000.00', '6000.00', 'FA00001', '0000-00-00', '2', '', '', '', '10', 'M', '0', 'BA002', 'Kabel', '2020-11-02 11:37:03', '15', '0', '45000', 'sales', '0');
INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (8, 'RB20110200001', '3', '35_dua', '2020-11-02', 'letty', 'rusak', '5', '10000.00', '18000.00', 'M20110200003', '0000-00-00', '2', '', '', '', '10', 'RB', '0', 'BA001', 'Colokan', '2020-11-02 11:40:47', '0', '5', '100000', 'sales', '10');
INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (40, 'MV20110200001', '2', '1_Administator', '2020-11-02', '1', 'Cash', '10', '100.00', '200.00', 'move 1 Ke 5 keluar', '0000-00-00', '1', '', '', '', '1', 'K', '0', 'kode', 'nama', '2020-11-02 13:47:13', '0', '10', '100', 'sales', '100');
INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (37, 'MV20110200001', '2', '1_Administator', '2020-11-02', '5', 'Cash', '10', '100.00', '200.00', 'move', '0000-00-00', '1', '', '', '', '5', 'M', '0', 'kode', 'nama', '2020-11-02 13:24:10', '10', '0', '100', 'sales', '0');
INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (36, 'MV20110200001', '2', '1_Administator', '2020-11-02', '1', 'Cash', '10', '100.00', '200.00', 'move', '0000-00-00', '1', '', '', '', '1', 'K', '0', 'kode', 'nama', '2020-11-02 13:24:10', '0', '10', '100', 'sales', '100');
INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (35, 'M20110200004', '2', '1_Administator', '2020-11-02', 'Vino Mandiri Perkasa', 'Hutang', '100', '100.00', '200.00', 'n0', '0000-00-00', '1', '', '', '', '1', 'M', '0', 'kode', 'nama', '2020-11-02 13:23:56', '100', '0', '10000', 'sales', '0');
INSERT INTO `keluar_masuk` (`id`, `nofaktur`, `idbarang`, `idadmin`, `tgl`, `supplier`, `stbayar`, `jml`, `modal`, `jual`, `nota`, `tbayar`, `idtoko`, `d1`, `d2`, `d3`, `gudang`, `ket`, `laba`, `kode`, `nama`, `waktu`, `masuk`, `keluar`, `total`, `sales`, `sebelum`) VALUES (42, '2200001', '1', '1_Administator', '2020-11-02', 'Abadi Swalayan', 'Cash', '5', '100.00', '200.00', 'pcs', '0000-00-00', '1', '', '', '', '5', 'K', '0', 'kode', 'nama', '2020-11-02 13:47:24', '0', '5', '200', 'umum', '10');


#
# TABLE STRUCTURE FOR: pelanggan
#

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `nama` varchar(99) DEFAULT NULL,
  `alamat` varchar(99) DEFAULT NULL,
  `kota` varchar(99) DEFAULT NULL,
  `telp` varchar(99) DEFAULT NULL,
  `batas` varchar(99) DEFAULT NULL,
  `lama` varchar(99) DEFAULT NULL,
  `kode` varchar(99) DEFAULT NULL,
  `idtoko` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=435 DEFAULT CHARSET=latin1;

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (1, 'MM Permata Mart', 'Simpang Jawo', 'Jambi', '   ', '12,300,000.00', '30', 'MPRT', '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (2, 'PL', 'The-hok', 'Jambi', '', '50,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (3, 'Anton', 'Kasang', 'Jambi', ' ', '20,000,000.00', '7', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (4, 'AAL Elektronik', 'Kasang', 'Jambi', ' ', '10,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (5, 'Surya Teknik', 'Handil', 'Jambi', ' ', '20,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (6, 'Mulya Teknik', 'Handil', 'Jambi', ' ', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (8, 'Darma', 'Handil', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (9, 'Sinar Indah', 'Handil', 'Jambi', ' ', '45,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (10, 'Surya Teknik A', 'Beringin', 'Jambi', 'Beringin', '20,000,000.00', '55', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (11, 'Mitra Jaya Elektronik', 'Beringin', 'Jambi', ' ', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (12, 'Cahaya Cell', 'Beringin', 'Jambi', '082376585519', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (13, 'Indo Jaya', 'Beringin', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (14, 'A Cuan 99', 'Beringin', 'Jambi', ' ', '4,500,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (15, 'Kevin Jaya', 'Pal - Merah', 'Jambi', ' ', '20,000,000.00', '55', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (16, 'ANR', 'Pal - Merah', 'Jambi', ' ', '30,000,000.00', '55', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (17, 'Terang Jaya', 'Pal - Merah', 'Jambi', ' ', '15,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (18, 'Cerry Electronic', 'Pal - Merah', 'Jambi', '`', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (19, 'GLobal Teknik', 'Sipin', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (20, 'Sinar Pralon', 'Persijam', 'Jambi', ' ', '5,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (21, 'Sinar Cahaya', 'Jelutung', 'Jambi', ' ', '10,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (22, 'Abadi Swalayan', 'Gatot Subroto', 'Jambi', ' ', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (23, 'Setara Raya', 'Gatot Subroto', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (24, 'Berkah Elektronik', 'Jalan Baru', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (25, 'Sinar Baru', 'Pasar', 'Jambi', ' ', '10,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (26, 'AMG', 'Pasar', 'Jambi', ' ', '40,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (27, 'Kawisan', 'Pasar', 'Jambi', ' ', '12,300,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (28, 'Mitsubishi', 'Pasar', 'Jambi', ' ', '20,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (29, 'Supersonic', 'Pasar', 'Jambi', ' ', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (30, 'Teknik JAYA', 'Pasar Angso', 'Jambi', ' ', '60,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (31, 'JAYA Electronic', 'Pasar', 'Jambi', '', '50,000,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (32, 'Mahkota Jaya', 'Pasar', 'Jambi', ' ', '20,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (33, 'Rejeki Makmur', 'Pasar', 'Jambi', ' ', '40,000,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (34, 'Star Elektronik', 'Pasar', 'Jambi', ' ', '12,300,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (35, 'Nippon Teknik', 'Pasar', 'Jambi', ' ', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (36, 'Maspion Jaya', 'Pasar', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (37, 'Sumber Sarana Teknik - SST', 'Kampung Manggis', 'Jambi', '', '50,000,000.00', '7', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (38, 'Iwan', 'Gatot subroto', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (39, 'Winner Jaya', 'Pasar Buah', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (40, 'General Teknik', 'Pasar Buah', 'Jambi', ' ', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (42, 'Cahaya Rejeki', 'Pasar Angso', 'Jambi', '082376585519', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (43, 'Wijaya Baru / Ahen', 'Talang Bakung', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (44, 'Santo', 'Pasar Baru', 'Jambi', '-', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (46, 'Wati', 'Selincah', 'Jambi', '-', '15,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (47, 'Idola', '-', 'Bungo', '082180911111', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (48, 'Citra Audio', 'Selincah', 'Jambi', 'Q', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (49, 'Mega Elektronik', 'Candra', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (50, 'Ahok', 'Talang Banjar', 'Jambi', '-', '5,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (51, 'BMB', 'Tj. Lumut', 'Jambi', '-', '12,300,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (52, 'Ganessha', 'Pasar Baru', 'Jambi', '-', '20,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (53, 'Cristal', 'Pasar Baru', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (54, 'Abadi Photo', 'Candra', 'Jambi', '1', '15,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (55, 'Usaha Maju', 'Candra', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (56, 'Gemilang Teknik', 'Talang Bakung', 'Jambi', '-', '12,300,000.00', '50', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (57, 'A TIEN Electronic', 'Talang Bakung', 'Jambi', '-', '55,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (58, 'Multi Mitra', 'Tj. Lumut Lr.Eka Jaya', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (59, 'Bayung Maju Teknik', 'Bayung', 'Jambi', '-', '35,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (60, 'Karya Mandiri', 'Talang Bakung', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (61, 'Cahaya Gemilang', 'Talang Bakung', 'Jambi', '082376585519', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (62, 'Haji Khaidar', 'Simpang  Murni', 'Jambi', '-', '5,000,000.00', '25', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (63, 'KIKI Electronic', 'Simpang Rimbo', 'Jambi', '`', '30,000,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (65, 'Jaya Baru', 'Simpang Rimbo', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (67, 'Surya Sipin', 'Sipin (Dpn Green Hotel)', 'Jambi', '-', '5,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (68, 'Mulia Jaya', 'Sipin', 'Jambi', '-', '50,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (69, 'Karina', 'Sipin', 'Jambi', '`', '50,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (70, 'Mitra Usaha', 'Sipin', 'Jambi', '-', '30,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (71, 'Sinar Sipin', 'Sipin', 'Jambi', '-', '50,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (72, 'Multi Irama', 'Sipin', 'Jambi', '-', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (73, 'Lisa Electronic', 'Sipin', 'Jambi', '-', '20,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (74, 'HD Elektronik', 'Mayang', 'Jambi', '-', '30,000,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (75, 'Sinar Surya', 'Persijam', 'Jambi', '081366241800', '5,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (76, 'Mitra Bangunan', 'Simpang Rimbo (Jl.Patimura)', 'Jambi', '-', '20,000,000.00', '55', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (77, 'TB. Berkah Utama', 'Sipin', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (79, 'MM Sukses', 'Pal - Merah', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (80, 'MM Garuda', 'Pal - Merah', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (81, 'JS Service', 'pal v', 'Jambi', '-', '40,000,000.00', '55', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (82, 'Sinar Abadi A', 'Simpang Kawat', 'Jambi', '2525', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (83, 'Irama Listrik', 'Simpang Kawat', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (85, 'Sederhana', 'Sipin', 'Jambi', '`', '45,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (86, 'Surya Elektronik', 'Sipin', 'Jambi', '-', '30,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (87, 'Sinar Baru - Sipin', 'Sipin', 'Jambi', '-', '12,300,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (88, 'Andika', 'Sipin', 'Jambi', '-', '10,000,000.00', '14', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (89, 'Central Electronic', 'Sipin', 'Jambi', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (90, 'Joe Lighting', 'Mayang', 'Jambi', '-', '10,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (91, 'Yanti', 'Mayang', 'Jambi', ' ', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (92, 'Hasan', 'Ir. Arizona', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (93, 'Ahen / Sinar Jaya', 'Mayang', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (94, 'SRI Baru', 'Sipin', 'Jambi', '  ', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (95, 'Cahaya Abadi', 'Mayang', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (96, 'Sinar Mayang', 'Mayang', 'Jambi', ' ', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (97, 'WR', 'Mayang', 'Jambi', ' ', '5,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (98, 'Sukses - Anok', 'Mayang', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (100, 'Sinar Terang', 'Jelutung', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (101, 'Tiara Photo', 'Jelutung', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (102, 'Sidohita', 'Jelutung', 'Jambi', '-', '15,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (103, 'Sinar Jaya', 'Talang Banjar', 'Jambi', '-', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (104, 'TB. Subur', 'The-hok', 'Jambi', '-', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (105, 'TB. Manunggal Jaya', 'Pasar Terminal', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (106, 'Jaya Indah', 'Pal - Merah', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (107, 'TB. Sumber Rejeki', 'The-hok', 'Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (108, 'Alam JAYA', 'The-hok', 'Jambi', '-', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (109, 'TB. Bintang Baru', 'The-hok', 'Jambi', '-', '10,000,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (110, 'Rejeki Jaya', 'The-hok', 'Jambi', '-', '6,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (111, 'Dinamika', 'The-hok', 'Jambi', '-', '20,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (112, 'A Kiang P2B', '-', 'Bangko', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (113, 'DEDI', 'Niaso', 'Jambi', '-', '30,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (114, 'AMIT', 'Jalan Baru', 'Jambi', '-', '70,000,000.00', '50', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (115, 'Sinar Jaya Bungo', 'bungo', 'Muaro Bungo', '-', '10,000,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (116, 'Hidup Baru / Iwan Lie', 'bungo', 'Muara Bungo', '-', '20,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (117, 'Cash / Retur', '', '', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (118, 'Aldi', 'Selincah', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (119, 'Haviz', 'Broni', 'Jambi', '-', '60,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (120, 'Multi Jaya', 'Pasar', 'Jambi', '-', '12,300,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (121, 'Ayu', 'Kebun Kopi', 'Jambi', '-', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (122, 'MM Putra', 'Talang Bakung', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (123, 'Ariyanto', 'Kasang Pudak', 'Jambi', '-', '10,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (124, 'ADI Jaya', 'The-hok', 'Jambi', '-', '30,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (125, 'MM Win Win', 'Simpang Rimbo', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (126, 'Sukses Abadi Sentosa', 'Kebun Kopi', 'Jambi', '2525', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (127, 'DW Electronic', 'Talang Bakung', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (362, 'Sinar Jaya Pudak', 'pudak', 'Jambi', '081933214510', '12,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (129, 'Sumber BERKAT', 'Mayang', 'Jambi', 'l', '12,300,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (130, 'Rahman', 'Broni', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (131, 'Sanjaya', 'Pasar', 'Jambi', '-', '10,000,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (132, 'Suwandi-SJT', 'The-hok', 'Jambi', '-', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (133, 'Nyaman Electronic', 'Jelutung', 'Jambi', '-', '5,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (134, 'Cash', '', 'Jambi', '`', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (135, 'Surya Kencana  SK', 'Pasar', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (136, 'Atik CMG', 'Budiman', 'Jambi', '-', '20,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (138, 'MD. Store', 'Jerambah Bolong', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (139, 'Sumber Cahaya 1', 'Pasar', 'Jambi', '082376585519', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (140, 'Surya Citra Cell', 'Handil', 'Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (141, 'Multi Abadi Jaya', 'Pal - Merah', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (143, 'Haryono', 'Lrg. Eka Jaya', 'Jambi', '-', '12,300,000.00', '0', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (144, 'MM Citra Media', 'Talang Banjar', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (145, 'MM THJ', 'Kebun Kopi', 'Jambi', '445621', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (146, 'Hunara', 'pal 13', 'Jambi', '087797670008', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (147, 'Sumber Bangunan', 'Broni', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (148, 'Edy / Kon Liang', 'nipah', 'Nipah Panjang', '-', '20,000,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (149, 'Sukses - Benny', 'Candra', 'Jambi', '-', '5,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (150, 'Irwan Service', 'Handil', 'Jambi', '08163200626', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (151, 'Sinar Elec / Samsung', 'Simpang Rimbo', 'Jambi', '07417070428', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (153, 'Delta Prima', 'Simpang Rimbo (L.Selatan)', 'Jambi', '7048402', '30,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (154, 'Dwi Karya', 'Simpang Rimbo (Dpn Kpg Raja)', 'Jambi', '3009988', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (156, 'TB. Mutiara Hijau', 'Mayang (Dpn Citra Land)', 'Jambi', '-', '12,300,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (157, 'Carly Perumnas', 'Handil', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (158, 'Sinar Listrik', 'bulian', 'Muara Bulian', '-', '15,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (159, 'SRI Rezeki', 'Simpang Asparagus', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (160, 'MM Rajawali', 'Kasang', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (161, 'TB. Nagamas', 'Buluran', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (162, 'Indah Rimbo', 'Simpang Rimbo', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (163, 'MM Angkasa', 'jambi', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (164, 'Sinar Makmur Jaya', 'Selincah (Dpn SD 84)', 'Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (165, 'TB. Sumber Maju Jaya', 'Beringin', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (166, 'Tugu Mandiri Electronic', 'Selincah', 'Jambi', '-', '10,000,000.00', '50', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (167, 'Atik Semeru', 'Kasang Pudak', 'Jambi', '-', '15,000,000.00', '55', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (168, 'Cahaya Indah', 'Pasar', 'Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (169, 'Star Photo', 'Mayang (Dpn RS Medical)', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (170, 'Garuda Electronic', 'Selincah', 'Jambi', '089624592000', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (171, 'Glory', 'Selincah', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (172, 'Lincah Jaya', 'Selincah', 'Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (174, 'Daya Cipta', 'Sipin', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (175, 'MM Piala Jaya', 'Kota Baru', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (177, 'Felix Bakung', 'Talang Bakung', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (178, 'Sumber Rejeki (Yuli)', 'Kebun Kopi', 'Jambi', '081274203508', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (179, 'Sunly E', 'Kebun Kopi', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (180, 'Jesslyin Electric 1', 'Kasang Pudak', 'Jambi', '-', '50,000,000.00', '50', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (181, 'Ricoh', 'Pasar Baru', 'Bangko', '-', '40,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (182, 'Asia Teknik', 'Simpang Kawat', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (183, 'Digit Cell', 'Kebon Kopi (Deket Rs.Royal)', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (184, 'Prima Indah', 'Pasar', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (185, 'Berkat Karya', 'Selincah', 'Jambi', '-', '45,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (371, 'adam jambi', '', '', '082376585519', '', '', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (187, 'TB. Mitra MAS', 'Selincah', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (188, 'Johan', 'Simpang Rimbo', 'Jambi', '-', '40,000,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (189, 'Sejahtera Photo', 'Pasar Baru', 'Jambi', '-', '12,300,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (190, 'TB. Sinar Mentari', 'Simpang Rimbo', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (191, 'Sinar Abadi Jaya', 'The-hok', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (192, 'TB. Cahaya Baru', 'The-hok', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (193, 'TB. Pelita Harapan', 'Kasang', 'Jambi', '-', '55,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (194, 'Baja Logam', 'Tanjung Pinang', 'Jambi', '-', '30,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (195, 'TB. TATA', 'Handil', 'Jambi', '-', '15,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (196, 'TB. Beringin Jaya', 'Beringin', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (197, 'TB. Steven Jaya', 'Pal - Merah', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (198, 'TB. Sinar Mandiri Jaya', 'Pal - V', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (199, 'Samudra Jaya 1', 'Kasang Pudak', 'Jambi', '-', '35,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (200, 'TB. Steven Bakung', 'Talang Bakung', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (201, 'Istana Electronic', 'Pasar Baru', 'Jambi', '-', '45,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (202, 'Multi Prima Bangunan', 'Mayang', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (203, 'Mandiri Jaya Beliung', 'Simpang Asparagus', 'Jambi', '-', '40,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (204, 'Toko Bunseng', 'Handil', 'Jambi', '08976686756', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (206, 'Toko Wulan', 'The-hok', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (207, 'Asia Star', 'Pal - Merah', 'Jambi', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (208, 'Jaya Bersama', 'Mayang', 'Jambi', '-', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (209, 'Panca Bangunan', 'Mendalo', 'Jambi', '-', '45,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (210, 'Arfeyos', 'Pal - Merah', 'Jambi', '-', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (211, 'Maju Jaya Mandiri', 'Simpang Asparagus', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (212, 'Valery / VR', 'Pal - Merah (L. SelatanII)', 'Jambi', '-', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (213, 'Ko Ahok', 'Petaling', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (214, 'Xing-Xing', 'Simpang Rimbo', 'Jambi', '-', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (216, 'Vindi', 'Jerambah Bolong', 'Jambi', '-', '20,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (217, 'TB. Tamir Jaya', 'Jerambah Bolong', 'Jambi', '-', '30,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (218, 'TB. Buana', 'Pal - Merah', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (219, 'Dony', 'Mendalo', 'Jambi', '-', '50,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (360, 'Toko Satu Led', 'Pal Merah', 'Jambi', '082565', '12,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (221, 'Surya KUMPEH', 'Kumpeh', 'Jambi', '-', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (222, 'Rio Bangunan', 'Mendalo', 'Jambi', '-', '45,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (223, 'TB. Sumber Rejeki (Men)', 'Mendalo', 'Jambi', '-', '20,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (224, 'Cahaya Kita', 'Jembatan Auduri 2', 'Jambi', '-', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (225, 'MM Mulya', 'Simpang Kawat', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (226, 'TB. Mandiri Jaya', 'Kebun Kopi', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (227, 'Vectro', 'Jembatan Makalam', 'Jambi', '-', '20,000,000.00', '50', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (228, 'Utama Jaya', 'Buluran', 'Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (229, 'TB. Thamrin', 'Buluran', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (230, 'Aina Elektrik', 'Pagar Drum', 'Jambi', '', '12,300,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (231, 'Yeni', 'Kasang Pudak', 'Jambi', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (232, 'Win Elektrik', 'Pal - V', 'Jambi', '081283625026', '35,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (233, 'Hendra Jaya', 'Mendalo', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (234, 'TB. Berkah Jaya', 'Talang Bakung', 'Jambi', 'aa', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (235, 'MM Top Central', 'Mendalo', 'Jambi', '-', '40,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (236, 'TB. Berkat Jaya', 'Simpang Ahok', 'Jambi', '-', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (237, 'Toko Candra', 'Tanjung Pinang', 'Jambi', '26771', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (238, 'TB. Safira', 'Jerambah Bolong', 'Jambi', '-', '35,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (239, 'MM Winnars', 'Mendalo', 'Jambi', '-', '40,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (240, 'Sumber Agung', 'Sipin', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (241, 'Globalindo Komputer', 'Selincah', 'Jambi', '-', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (242, 'CS Variasi', 'Simpang Rimbo', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (243, 'Sinar Harapan Baru', 'The-hok', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (244, 'Toko Sony', '-', 'Kuala Tungkal', '085266026388', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (245, 'Sannsui Tungkal', '-', 'Kuala Tungkal', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (246, 'Wijaya Baru', '-', 'Kuala Tungkal', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (247, 'Toko ALUNG', '-', 'Kuala Tungkal', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (248, 'Asia Electronic', '-', 'Kuala Tungkal', '081310915880', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (249, 'Cahaya / Ahui', '-', 'Kuala Tungkal', '0742-21928', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (250, 'Toko Sejati', '-', 'Kuala Tungkal', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (251, 'Cantronik', '-', 'Guntung', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (252, 'On Service', '-', 'Guntung', '-', '50,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (253, 'Utama Electronic', '', 'Guntung', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (254, 'Indo Com', '-', 'Guntung', '-', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (255, 'Wendy', '-', 'Guntung', '-', '50,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (256, 'Oke Mart', '-', 'Guntung', '-', '80,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (257, 'Toko Maya', '-', 'Pulau Kijang', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (258, 'Anton Setia', '-', 'Pulau Kijang', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (259, 'Bidin', '-', 'Kota Baru', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (260, 'Iwan A', 'Simpang Rimbo', 'Jambi', '0', '30,000,000', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (261, 'Jasa Teknik', 'Simpang Rimbo', 'Jambi', '-', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (262, 'Jaya Murni', '-', 'Guntung', '-', '50,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (263, 'Jaya Super', '\"Jl. Siliwangi 2\r\"', 'Singkut', '085369793665', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (264, 'H. Jamak', '-', 'Kota Baru', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (265, 'Indah Teknik', '-', 'Pulau Kijang', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (266, 'Harapan Baru', '-', 'Kuala Tungkal', '-', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (267, 'TB. Anugrah', 'Sungai Gelam', 'Jambi', '085266648368', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (268, 'Toko Nega', 'Simpang Kawat', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (269, 'Happines', 'Selincah', 'Jambi', '085266534764', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (270, 'Rio Valensia', 'Mendalo', 'Jambi', '-', '45,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (271, 'Rudi Bersaudara', 'Tj. Lumut', 'Jambi', '-', '12,300,000.00', '50', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (272, 'Sahabat Sukses', 'Jelutung (Dpn Asrama PM)', 'Jambi', '-', '20,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (273, 'Sinar Abadi B', 'Pasar Baru', 'Bangko', '-', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (274, 'Central Elec / Handil', 'Handil', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (275, 'Bintang Jaya', 'Sipin', 'Jambi', '-', '35,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (276, 'Hartono Electronic', 'Pal - Merah', 'Jambi', '-', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (277, 'H2J', 'Sipin', 'Jambi', '-', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (278, 'MM Sentosa', 'Ir. Arizona', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (279, 'Samudra Jaya 2', 'Kasang Pudak', 'Jambi', '-', '45,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (280, 'Axsterik', '-', 'Guntung', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (281, 'Sri Guntung', '-', 'Guntung', '-', '50,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (282, 'Sahabat Kita', 'Sipin', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (283, 'Elektra', 'sarolangun', 'Sarolangun', '-', '20,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (284, 'Citra Karya', '-', 'Guntung', '-', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (369, 'Asiri', ' ', 'Jambi', ' ', '5,000,000.00', ' 1', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (363, 'Gudang', ' ', 'Jambi', '   ', '10,000,000.00', ' ', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (287, 'JSC', 'Pal - 13', 'Jambi', '-', '40,000,000.00', '55', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (288, 'MM Vanessa', 'Sejinjang', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (289, 'Mitra Listrik', 'Simpang  Pulai', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (290, 'Masurai', 'Pasar', 'Jambi', '-', '50,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (387, 'Sinar abadi-bangko', 'bangko', 'bangko', '085266950850', '40,000,000.00', '50', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (292, 'Makmur Jaya', 'Handil', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (293, 'Manggala', 'Sipin', 'Jambi', '-', '10,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (295, 'Zahwa', 'Kasang Pudak', 'Jambi', '-', '5,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (296, 'Sarang Bangunan', '-', 'Guntung', '-', '50,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (297, 'Manggo Sejati', 'Talang Banjar', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (298, 'Citra Jaya', 'Mendalo', 'Jambi', '-', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (299, 'Udin', 'Lingkar Selatan', 'Jambi', '-', '50,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (300, 'Palma', 'Pal - Merah', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (301, 'SR Elektronik', 'Marene', 'Jambi', '`', '70,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (366, 'Toko Arsyila', 'Sungai Bahar Unit 1', 'Jambi', '', '12,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (303, 'Sinar Terang Bakung', 'Talang Bakung', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (304, 'Cahaya', 'Selincah', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (305, 'Nusantara', '-', 'Guntung', '-', '50,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (307, 'Boboho Cell', 'Talang Bakung', 'Jambi', '-', '5,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (308, 'Toko Budi', 'Patimura', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (309, 'Toko Rony', '-', 'Kota Baru', '-', '40,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (311, 'MM Raja', 'Pal - VI (Depan BPK)', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (312, 'Toko Cahaya Abadi', 'Pal - 11', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (313, 'Grent Mart', 'Mendalo', 'Jambi', '-', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (315, 'Serba Aneka', 'Persijam', 'Jambi', '-', '15,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (316, 'Azhar Electronic', 'Mayang', 'Jambi', '-', '12,300,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (317, 'Harapan Utama Indah', '-', 'Guntung', '-', '40,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (318, 'EDI', 'Talang Banjar', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (319, 'Abung', 'Sipin', 'Jambi', '-', '20,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (320, 'Ruben', 'Candra', 'Jambi', '-', '5,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (321, 'Hawai Jaya', 'Pasar', 'Jambi', '-', '12,300,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (322, 'CMD', 'The-hok', 'Jambi', '-', '60,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (323, 'TB. Dilka Jaya', 'Tj. Lumut Lrg.SD109', 'Jambi', '-', '5,000,000.00', '35', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (324, 'Sinar Surya (Pudak)', 'Kasang Pudak', 'Jambi', '-', '30,000,000.00', '55', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (325, 'TB. Sukses Raya', 'Dekat SMK Yadika', 'Jambi', '081274609261', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (326, 'Aditia', 'Mayang', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (327, 'TB. SJA', 'Talang Bakung', 'Jambi', '-', '20,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (328, 'Fitri Jaya', 'Mayang', 'Jambi', '-', '45,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (329, 'MM Surya', 'Handil', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (330, 'TB. TSJ', 'Talang Bakung', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (331, 'MM Gemilang', 'Talang Bakung', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (332, 'MM Raja (Tangkit)', 'Tangkit', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (333, 'Sumber Maju (Mayang)', 'Arizona', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (334, 'Sumber Elektronik', 'Mendalo', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (335, 'Toko RAFA', 'Candra', 'Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (336, 'Ricky Electronic', '-', 'Bulian', '-', '20,000,000.00', '74', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (337, 'Surya Elektronik A', 'Guntung', 'Jambi', ' -', '80,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (338, 'TB. Az Zahwa Jaya', 'Lrg. Kartini', 'Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (339, 'Makmur Utama', 'Pal - 8', 'Jambi', '-', '20,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (364, 'Si ASS', 'Haji kamil', 'Jambi', ' ', '5,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (341, 'MM Rejeki', 'Kebun Kopi', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (342, 'Gita', 'lr. Arizona', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (343, 'MM Permata', 'Handil', 'Jambi', '-', '12,300,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (344, 'Wulan', 'Sipin', 'Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (345, 'Budiman', 'Simpang Jawa', 'Jambi', '081274423402', '5,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (346, 'MM Meranti', 'Persijam', 'Jambi', '', '12,300,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (365, 'MM permata Marene', 'Marene', 'Jambi', '', '30,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (355, 'Mitra Sukses', 'Pal Merah', 'Jambi', '08526400', '12,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (357, 'Star Cell', 'Simpang Rimbo', 'Jambi', '085254005005', '12,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (372, 'ifan jambi', '', '', '', '', '', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (373, 'Citra Jaya', 'Mendalo', 'Ma. Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (377, 'Bintang Sejati', 'Sungai Gelam', 'Jambi', '0', '30,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (380, 'Jesslyin Electric 2', 'Mayang', 'Jambi', '082565', '30,000,000.00', '50', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (381, 'Mm Wil Win Mart', 'mayang', 'Jambi', 'aa', '30,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (383, 'Toko Rejeki Keluarga', 'Simpang Ahok', 'Jambi', 'aa', '12,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (386, 'Willy ', 'Pudak', 'Jambi', '-', '5,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (388, 'Toko Anissa', 'Mayang', 'Jambi', '-', '5,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (397, 'TB. Toni Jaya', 'Lingkar Selatan', 'Jambi', '0', '5,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (399, 'Grunding', 'pasar', 'jambi', '', '12,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (402, 'Tugu', 'Simpang Tugu juang', 'Jambi', '01', '15,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (403, 'Baja indah', 'pulau kijang', 'Jambi', '2525', '45.00', '18,000.00', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (432, 'gudang (karyawan)', 'hj.kamil', 'jambi', '0', '10,000,000.00', '60', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (406, 'budi kampas', 'jambi', 'Jambi', '-', '10,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (407, ' Deli', 'Pal Merah', 'Jambi', '085', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (409, 'Hanna', 'Simpang Jawo', 'Jambi', '258', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (410, 'Indah', 'Handil', 'Jambi', '258', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (411, 'Nanda', 'sungai sawang', 'Jambi', '0589', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (422, 'TB. Berkah jaya jb', 'jeramba bolong', 'Jambi', 'aa', '12,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (413, 'Devi', 'Kebun Kopi', 'Jambi', '052', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (414, 'Elektro', 'Buluran', 'Jambi', '2525', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (416, 'TB. Kurnia jaya Abadi', 'Selincah', 'Jambi', '082565', '30,000,000.00', '15', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (423, 'Sumber Cahaya 2', 'persijam', 'Jambi', '082565', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (433, 'Sukses Jaya Teknik ', 'Pal Merah', 'Jambi', '0', '12,000,000.00', '40', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (425, 'R2 Elektronik', 'Talang Banjar', 'Jambi', '12025', '50,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (429, 'Mulyana', 'marene', 'Jambi', '0', '30,000,000.00', '30', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (428, 'Prabana Elektrik', 'Sipin, Kedaung', 'Jambi', 'aa', '12,000,000.00', '45', NULL, '1');
INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telp`, `batas`, `lama`, `kode`, `idtoko`) VALUES (434, 'adam', '-', '-', '-', '-', '40', 'adam', '2');


#
# TABLE STRUCTURE FOR: pembayaran
#

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nobil` varchar(15) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `jml` varchar(99) DEFAULT NULL,
  `ket` text,
  `st` varchar(99) DEFAULT NULL,
  `supplier` text,
  `jenis` varchar(99) DEFAULT NULL,
  `gudang` int(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `pembayaran` (`id`, `nobil`, `tglbayar`, `jml`, `ket`, `st`, `supplier`, `jenis`, `gudang`) VALUES (9, 'um20110200001', '2020-11-02', '100,000.00', 'jasa perbaikan tv', '0', '', 'um', 2);
INSERT INTO `pembayaran` (`id`, `nobil`, `tglbayar`, `jml`, `ket`, `st`, `supplier`, `jenis`, `gudang`) VALUES (10, 'uk20110200001', '2020-11-02', '12,000.00', 'beli makan', '0', '', 'uk', 2);


#
# TABLE STRUCTURE FOR: pengaturan
#

DROP TABLE IF EXISTS `pengaturan`;

CREATE TABLE `pengaturan` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nmtoko` varchar(99) DEFAULT NULL,
  `atas` varchar(99) DEFAULT NULL,
  `bawah` varchar(99) DEFAULT NULL,
  `faktur` text,
  `promo` text,
  `logo` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `pengaturan` (`id`, `nmtoko`, `atas`, `bawah`, `faktur`, `promo`, `logo`) VALUES (1, 'Program Toko', 'Program Toko', 'Copyright © 2020 Program Toko', '	Faktur Penjualan<br />Program Toko<br />\r\n			', '-', 'toko.png');
INSERT INTO `pengaturan` (`id`, `nmtoko`, `atas`, `bawah`, `faktur`, `promo`, `logo`) VALUES (2, 'dua', 'dua', NULL, NULL, NULL, 'toko.png');


#
# TABLE STRUCTURE FOR: sales
#

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(99) DEFAULT NULL,
  `alamat` varchar(99) DEFAULT NULL,
  `nohp` varchar(99) DEFAULT NULL,
  `idtoko` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `sales` (`id`, `nama`, `alamat`, `nohp`, `idtoko`) VALUES (1, 'umum', '-', '-', '1');
INSERT INTO `sales` (`id`, `nama`, `alamat`, `nohp`, `idtoko`) VALUES (2, 'febri', 'jambi', '082376585519', '2');


#
# TABLE STRUCTURE FOR: supplier
#

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` int(99) NOT NULL AUTO_INCREMENT,
  `nmsup` varchar(200) DEFAULT NULL,
  `alamat` varchar(99) DEFAULT NULL,
  `notelp` varchar(99) DEFAULT NULL,
  `ket` varchar(99) DEFAULT NULL,
  `tempo` varchar(99) DEFAULT NULL,
  `kode` varchar(99) DEFAULT NULL,
  `idtoko` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (1, 'Vino Mandiri Perkasa', 'Jakarta', '', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (2, 'Multi Jaya Prima', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (4, 'Philips', 'Jambi', '-', '-', '0', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (5, 'Makmur Abadi (MA)', 'Jakarta', '021-6120928 / 085959183636', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (6, 'Sinar Jaya', 'Jl. lodan Raya no. 2 Blok L no 5', '021-698 33188', '-', '105', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (7, 'Cahaya Mas Semny', 'Jl. Lodan Center B / 12', '021-709 58668', '-', '105', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (8, 'Tesla Lighting', 'Medan', '-', '-', '85', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (9, 'Mulia Agung / Mulia Jaya E', 'Jl. Sunter Barat Blok A/13 Sunter Jaya', '021-70958127,.68280995', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (10, 'Ganda Jaya Abadi', 'Mega Glodok Kemayoran Blok A', '021-29135956', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (11, 'Aneka Listrik / ALS', 'Jakarta', '-', '-', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (13, 'Multi Electric - Medan', 'Jl. Surakarta No 11', '061 4574 923', '-', '70', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (14, 'Sumber Raya', '-', '-', '-', '105', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (16, 'Sinar Lestari', '-', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (18, 'Morning Star MSE', 'Jl. P. Jaya Karta Komp. 119 No 14', '021-639 1644', '-', '105', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (19, 'AWIE', 'Jambi', '', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (20, 'Sinar Permai', '-', '-', '-', '85', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (22, 'Bumi Central Harapan', 'Jakarta', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (23, 'Vedora / VDR', 'Jl. Pantai Indah Timur - Kapuk Raya', '021- 7067 5111.7067 5222', '-', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (24, 'Cahaya Gemilang', '-', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (26, 'YHS Electric', 'Jl. Markisa Blok RA No 12. Kota Harapan Indah', '021- 8897 5784', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (27, 'DW', 'Jakarta', '021-5696 8857', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (28, 'Ekatama Electric', '-', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (30, 'SANDI', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (31, 'SSA / LGB', '\"Jl. Pangeran Jayakarta', NULL, NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (33, 'Jasindo', '-', '-', '-', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (34, 'Aneka Kabel', '-', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (35, 'Wen Jaya Electronic', '-', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (97, 'Luby', 'Jakarta', '1235', 'supplier', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (37, 'Aditama Electric', 'Jl. P Jayakarta No 14-17-18', '021-626 8876. 626 8878', '-', '110', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (38, 'Pratama Putra J', 'Jakarta', '', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (39, 'Matari Electric', '-', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (41, 'CV.EASTERN DEPO', '-', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (42, 'PD. Citra Mandiri', 'Jakarta', '', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (43, 'Asia Jaya', '-', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (44, 'Terang Jaya ATN', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (45, 'Surya Abadi Makmur / SAM', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (46, 'Returan (Masuk stock)', 'Jambi', '', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (47, 'Cahaya Berkat', 'Jakarta', '', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (48, 'Aoki', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (49, 'Mentari Jaya', 'Jakarta', '', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (50, 'Jaya Sentosa', 'Jl. Budi Mulya No. 24', '0813-1132-9299', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (51, 'AEUNG', 'Jakarta', '', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (52, 'Intrasari', 'Jakarta', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (53, 'Sinar Intan', 'Jakarta', '', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (54, 'Favorite', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (55, 'Galaxy', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (56, 'Lancar Electronic', 'Jakarta', '02164711616', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (57, 'Hoki Pas', 'Jakarta', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (58, 'Bintang Timur / Cahaya', 'Jakarta', '021-6470-18 91/92', '-', '105', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (59, 'LENKA / SG', 'Jakarta', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (60, 'Cahaya Mas Multi Mandiri (CME)', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (61, 'Twin Dog', 'Jakarta', '-', '-', '105', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (62, 'SUF Mitsuyama', 'Jakarta', '', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (63, 'Mitra Fajar Ibu Kota', 'Jakarta', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (64, 'ISA', 'Jakarta', '-', '-', '85', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (65, 'Ascendo ASC', 'Jl. Blak No.7 H', '021-63869222', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (66, 'Bintang Inovasi', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (67, 'Sinar Mas Elektrik', '-', '-', '-', '105', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (69, 'Sinar Abadi Electric', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (70, 'Himawari', 'Jakarta', '-', '-', '105', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (71, 'Indo Prima / Prima E', 'Komp. Puri Delta Mas Blok I No. 21', '-', '-', '85', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (72, 'LKP', 'Jakarta', '0812-8379-7905/ 021-5694-2688', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (73, 'Chang Ping', 'Jakarta', '0813-1441-3899', NULL, NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (74, 'One Hao / CDE', 'Jakarta', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (75, 'SDS', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (76, 'Dunia Baru', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (77, 'Rezeki Kencana Mandiri', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (78, 'Bintang Universal', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (79, 'HXD', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (80, '3 Electric', 'Jakarta', '-', '-', '105', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (81, 'Gunawan', 'Jakarta', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (82, 'Cosco Elec', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (83, 'Kemenangan', 'Jakarta', '-', '-', '0', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (84, 'Hensonic', 'Jakarta', '-', '-', '95', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (85, 'AWO/ AE', 'Jakarta', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (87, 'tera', '', '', '', NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (88, 'ppj', '', '', '', NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (89, 'Gunung Sari', '', '', '', NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (90, 'Augen Indonesia', 'Jakarta', '085', 'aa', NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (91, 'Focos Elec / ACM', '-', '-', '-', '100', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (92, 'Universal elektronik', 'Jakarta', '14514', 'aa', NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (93, 'PT. Solid Hadi Karya', '', '', '', NULL, NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (94, 'Morgen', 'Jakarta', ' ', '-', '45', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (95, 'SAN', 'Jakarta', '0852', ' -', '-', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (98, 'Dharma Abadi', 'Jambi', '085', 'aa', '30', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (99, 'ANR', 'Jambi', 'aa', '0', '12,000,000.00', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (100, 'Jaya Abadi Sakti', 'Jakarta', '085', 'aa', '30,000,000.00', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (101, 'Sejati Unggul Persada', 'padang', '88', 'aa', '45', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (102, 'Mulia Agung Elektric/MAE', 'Jakarta', '0853', 'kj', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (104, 'Harapan Baru', 'Jakarta', '6363', 'kh', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (105, 'Cahaya Abadi', 'Jakarta', '14514', '082565', '30,000,000.00', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (106, 'MUE/ Mulia Unggul Elekt', 'Jakarta', '085', 'aa', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (107, 'Megatama', 'Jakarta', '0852336', 'gb', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (108, 'Sumber Damai E', 'Jakarta', 'aa', '0', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (109, 'Matsui', 'Jakarta', '085', 'hj', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (110, 'R3S', 'Jakarta', '0234', '1254', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (111, 'Dinamika', 'Jambi', '1578', 'aa', '30', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (112, 'Julianto', 'Jakarta', '-', '-', '120', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (113, 'Dunia Metal', 'Tagerang jakarta', '085', 'aa', '90', NULL, '1');
INSERT INTO `supplier` (`id`, `nmsup`, `alamat`, `notelp`, `ket`, `tempo`, `kode`, `idtoko`) VALUES (114, 'letty', '-', '-', '-', '-', '-', '2');


