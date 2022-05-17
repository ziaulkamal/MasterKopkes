# MasterKopkes

Revisi Versi Sebelumnya, Import Database yang baru

Untuk versi lama jangan di hapus karna sebagai pembelajaran aja


Syntax Sql yang tidak Berhasil di import, silahkan di import ulang dengan console

# Copy here
CREATE VIEW master_view_anggota_all AS SELECT
tb_anggota.no_anggota AS no,
tb_anggota.nama_anggota AS nama,
tb_instansi.nama_instansi AS instansi,
tb_anggota.status AS status,
tb_anggota.registration AS terdaftar
FROM tb_anggota INNER JOIN tb_instansi WHERE tb_anggota.instansi = tb_instansi.kode_instansi
