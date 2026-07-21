CREATE TABLE cart (
    id_cart INT AUTO_INCREMENT PRIMARY KEY,
    id_produk INT,
    qty INT DEFAULT 1,

    FOREIGN KEY (id_produk)
    REFERENCES produk(id_produk)
    ON DELETE CASCADE
);