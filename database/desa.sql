SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET AUTOCOMMIT = 0;

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

-- Database: `pengaduan`

-- --------------------------------------------------------

-- Struktur dari tabel `data_mahasiswa`

CREATE TABLE
    `data_mahasiswa` (
        `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
        `nama` varchar(50) NOT NULL,
        `jenis_kelamin` varchar(10) NOT NULL,
        `npm` char(16) NOT NULL,
        `fakultas` varchar(50) NOT NULL,
        `program_studi` varchar(50) NOT NULL,
        `no_telp` varchar(12) NOT NULL,
        PRIMARY KEY (`id_mahasiswa`)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- Dumping data untuk tabel `data_mahasiswa`

INSERT INTO
    `data_mahasiswa` (
        `id_mahasiswa`,
        `nama`,
        `jenis_kelamin`,
        `npm`,
        `fakultas`,
        `program_studi`,
        `no_telp`
    )
VALUES (
        1,
        'RAFFI ABDILLAH PUTRA ALISIA',
        'Laki-laki',
        '21082010158',
        'ILMU KOMPUTER',
        'SISTEM INFORMASI',
        '085456789890'
    ), (
        2,
        'AN NISAA RESPATI NURCAHYENGSI',
        'Perempuan',
        '21082010139',
        'ILMU KOMPUTER',
        'SISTEM INFORMASI',
        '085110358688'
    );

-- --------------------------------------------------------

-- Struktur dari tabel `mahasiswa`

CREATE TABLE
    `mahasiswa` (
        `npm` char(16) NOT NULL,
        `nama` varchar(50) NOT NULL,
        `jenis_kelamin` varchar(10) NOT NULL,
        `fakultas` varchar(50) NOT NULL,
        `program_studi` varchar(50) NOT NULL,
        `no_telp` varchar(12) NOT NULL,
        `username` varchar(25) NOT NULL,
        `password` varchar(32) NOT NULL,
        PRIMARY KEY (`npm`)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- Dumping data untuk tabel `mahasiswa`

INSERT INTO
    `mahasiswa` (
        `npm`,
        `nama`,
        `jenis_kelamin`,
        `fakultas`,
        `program_studi`,
        `no_telp`,
        `username`,
        `password`
    )
VALUES (
        '21082010158',
        'RAFFI ABDILLAH PUTRA ALISIA',
        'Laki-laki',
        'ILMU KOMPUTER',
        'SISTEM INFORMASI',
        '085780353253',
        'Raffi',
        '123'
    ), (
        '21082010139',
        'AN NISAA RESPATI NURCAHYENGSI',
        'Perempuan',
        'ILMU KOMPUTER',
        'SISTEM INFORMASI',
        '0857532532632',
        'Ica',
        '1234'
    );

-- --------------------------------------------------------

-- Struktur dari tabel `pengaduan`

CREATE TABLE
    `pengaduan` (
        `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
        `tgl_pengaduan` varchar(40) NOT NULL,
        `nama_pengadu` varchar(40) NOT NULL,
        `jenis_kelamin` varchar(10) NOT NULL,
        `npm` char(16) NOT NULL,
        `isi_laporan` text NOT NULL,
        `tlp` varchar(13) NOT NULL,
        `foto` varchar(255) NOT NULL,
        `status` enum('Proses', 'Selesai') NOT NULL,
        PRIMARY KEY (`id_pengaduan`),
        KEY `npm` (`npm`),
        CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- Dumping data untuk tabel `pengaduan`

INSERT INTO
    `pengaduan` (
        `id_pengaduan`,
        `tgl_pengaduan`,
        `nama_pengadu`,
        `jenis_kelamin`,
        `npm`,
        `isi_laporan`,
        `tlp`,
        `foto`,
        `status`
    )
VALUES (
        1,
        '2023-01-26 (10:43:52)',
        'RAFFI ABDILLAH PUTRA ALISIA',
        'Laki-laki',
        '21082010158',
        'Terjadi tindak kekerasan',
        '0857532532632',
        'images (1).jpeg',
        'Selesai'
    ), (
        2,
        '2023-01-27 (09:28:33)',
        'AN NISAA RESPATI NURCAHYENGSI',
        'Perempuan',
        '21082010139',
        'Telah terjadi tindak pembullyan',
        '085780353253',
        'images (2).jpeg',
        'Selesai'
    );

-- --------------------------------------------------------

-- Struktur dari tabel `petugas`

CREATE TABLE
    `petugas` (
        `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
        `nama_petugas` varchar(35) NOT NULL,
        `username` varchar(25) NOT NULL,
        `password` varchar(32) NOT NULL,
        `tlp` varchar(13) NOT NULL,
        `level` enum('admin', 'petugas') NOT NULL,
        PRIMARY KEY (`id_petugas`)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- Dumping data untuk tabel `petugas`

INSERT INTO
    `petugas` (
        `id_petugas`,
        `nama_petugas`,
        `username`,
        `password`,
        `tlp`,
        `level`
    )
VALUES (
        1,
        'Irawan',
        'admin',
        'admin',
        '081617898716',
        'admin'
    ), (
        2,
        'Diana',
        'petugas1',
        'petugas1',
        '081617898717',
        'petugas1'
    ), (
        3,
        'Heri',
        'petugas2',
        'petugas2',
        '081617678909',
        'petugas2'
    ), (
        4,
        'Eka',
        'petugas3',
        'petugas3',
        '081610987654',
        'petugas3'
    );

-- --------------------------------------------------------

-- Struktur dari tabel `tanggapan`

CREATE TABLE
    `tanggapan` (
        `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
        `id_pengaduan` int(11) NOT NULL,
        `tgl_tanggapan` varchar(40) NOT NULL,
        `isi_laporan` text NOT NULL,
        `tanggapan` text NOT NULL,
        `id_petugas` int(11) NOT NULL,
        PRIMARY KEY (`id_tanggapan`),
        KEY `id_pengaduan` (`id_pengaduan`),
        KEY `id_petugas` (`id_petugas`),
        CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
        CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- Dumping data untuk tabel `tanggapan`

INSERT INTO
    `tanggapan` (
        `id_tanggapan`,
        `id_pengaduan`,
        `tgl_tanggapan`,
        `isi_laporan`,
        `tanggapan`,
        `id_petugas`
    )
VALUES (
        1,
        2,
        '2020-03-05 (21:49:23)',
        'Terjadi tindak kekerasan',
        'Pelaku sudah ditangkap',
        1
    ), (
        2,
        3,
        '2020-03-05 (21:49:43)',
        'Telah terjadi tindak pembullyan',
        'Pelaku mendapat surat peringatan',
        2
    );

-- --------------------------------------------------------

-- Indexes for dumped tables

--

-- Indeks untuk tabel `data_mahasiswa`

--

ALTER TABLE `data_mahasiswa` ADD PRIMARY KEY (`id_mahasiswa`);

-- Indeks untuk tabel `mahasiswa`

--

ALTER TABLE `mahasiswa` ADD PRIMARY KEY (`npm`);

-- Indeks untuk tabel `pengaduan`

--

ALTER TABLE `pengaduan` ADD KEY `npm` (`npm`);

-- Indeks untuk tabel `petugas`

--

ALTER TABLE `petugas` ADD PRIMARY KEY (`id_petugas`);

-- Indeks untuk tabel `tanggapan`

--

ALTER TABLE `tanggapan`
ADD
    KEY `id_pengaduan` (`id_pengaduan`),
ADD
    KEY `id_petugas` (`id_petugas`);

-- AUTO_INCREMENT untuk tabel yang dibuang

--

-- AUTO_INCREMENT untuk tabel `data_mahasiswa`

--

ALTER TABLE
    `data_mahasiswa` MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 34;

-- AUTO_INCREMENT untuk tabel `pengaduan`

--

ALTER TABLE
    `pengaduan` MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 43;

-- AUTO_INCREMENT untuk tabel `petugas`

--

ALTER TABLE
    `petugas` MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

-- AUTO_INCREMENT untuk tabel `tanggapan`

--

ALTER TABLE
    `tanggapan` MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

COMMIT;