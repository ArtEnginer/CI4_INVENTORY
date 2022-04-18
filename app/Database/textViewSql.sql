(select `inventory`.`barang`.`id_barang` AS `id_barang`,`inventory`.`barang`.`nm_barang` AS `nm_barang`,`inventory`.`suplai_detail`.`jumlah` AS `jumlah`,`inventory`.`suplai`.`id_suplai` AS `id`,`inventory`.`barang`.`satuan` AS `satuan`,`inventory`.`suplai`.`created_at` AS `created_at` from ((`inventory`.`suplai` join `inventory`.`suplai_detail`) join `inventory`.`barang`) where `inventory`.`suplai`.`id_suplai` = `inventory`.`suplai_detail`.`id_suplai` and `inventory`.`suplai_detail`.`id_barang` = `inventory`.`barang`.`id_barang`) 

union

 (select `inventory`.`barang`.`id_barang` AS `id_barang`,`inventory`.`barang`.`nm_barang` AS `nm_barang`,`inventory`.`keluar_detail`.`jumlah` AS `jumlah`,`inventory`.`keluar`.`id_keluar` AS `id`,`inventory`.`barang`.`satuan` AS `satuan`,`inventory`.`keluar`.`created_at` AS `created_at` from ((`inventory`.`keluar` join `inventory`.`keluar_detail`) join `inventory`.`barang`) where `inventory`.`keluar`.`id_keluar` = `inventory`.`keluar_detail`.`id_keluar` and `inventory`.`keluar_detail`.`id_barang` = `inventory`.`barang`.`id_barang`)






ALTER TABLE `inventory`.`keluar_detail` DROP INDEX `id_keluar`, ADD INDEX `id_keluar` (`id_keluar`) USING BTREE;
