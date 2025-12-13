CREATE TABLE pesanan (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    hp VARCHAR(20) NOT NULL,
    tanggal DATE NOT NULL,
    hari INT(11) NOT NULL,
    peserta INT(11) NOT NULL,
    paket VARCHAR(100) NOT NULL,
    penginapan TINYINT(1) DEFAULT 0,
    transportasi TINYINT(1) DEFAULT 0,
    makan TINYINT(1) DEFAULT 0,
    harga_paket DECIMAL(15,2) NOT NULL,
    total_tagihan DECIMAL(15,2) NOT NULL
);