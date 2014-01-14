-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_level`
--

CREATE TABLE IF NOT EXISTS `anggota_level` (
  `anggota_level_id`         tinyint(1)   unsigned NOT NULL AUTO_INCREMENT,
  `anggota_level_alias`      varchar(16)           NOT NULL,
  `anggota_level_nama`       varchar(32)           NOT NULL,
  `anggota_level_keterangan` varchar(255) DEFAULT      NULL,
  PRIMARY KEY         (`anggota_level_id`),
  UNIQUE  KEY `alias` (`anggota_level_alias`),
  UNIQUE  KEY `judul` (`anggota_level_nama`),
  KEY `deskripsi` (`anggota_level_keterangan`)
) ENGINE         = InnoDB  DEFAULT CHARSET=latin1 
  COMMENT        = 'Kriteria anggota dalam mengakses sistem' 
  AUTO_INCREMENT = 4 ;

--
-- Dumping data untuk tabel `anggota_level`
--

INSERT INTO `anggota_level` (`anggota_level_id`, `anggota_level_alias`, `anggota_level_nama`, `anggota_level_keterangan`) VALUES
(1, 'administrator', 'Administrator', 'Pemilik usaha atau staff khusus yang bertangung jawab atas basisdata'),
(2, 'karyawan', 'Karyawan', 'Pelaksana usaha yang terdiri dari menejer dan karyawan lapangan. '),
(3, 'anggota', 'Anggota', 'Konsumen sebagai pengguna usaha');
