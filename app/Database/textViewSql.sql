(select `dbinventory`.`barang`.`id_barang` AS `id_barang`,`dbinventory`.`barang`.`nm_barang` AS `nm_barang`,`dbinventory`.`suplai_detail`.`jumlah` AS `jumlah`,`dbinventory`.`suplai`.`id_suplai` AS `id`,`dbinventory`.`barang`.`satuan` AS `satuan`,`dbinventory`.`suplai`.`created_at` AS `created_at` from ((`dbinventory`.`suplai` join `dbinventory`.`suplai_detail`) join `dbinventory`.`barang`) where `dbinventory`.`suplai`.`id_suplai` = `dbinventory`.`suplai_detail`.`id_suplai` and `dbinventory`.`suplai_detail`.`id_barang` = `dbinventory`.`barang`.`id_barang`) 

union

 (select `dbinventory`.`barang`.`id_barang` AS `id_barang`,`dbinventory`.`barang`.`nm_barang` AS `nm_barang`,`dbinventory`.`keluar_detail`.`jumlah` AS `jumlah`,`dbinventory`.`keluar`.`id_keluar` AS `id`,`dbinventory`.`barang`.`satuan` AS `satuan`,`dbinventory`.`keluar`.`created_at` AS `created_at` from ((`dbinventory`.`keluar` join `dbinventory`.`keluar_detail`) join `dbinventory`.`barang`) where `dbinventory`.`keluar`.`id_keluar` = `dbinventory`.`keluar_detail`.`id_keluar` and `dbinventory`.`keluar_detail`.`id_barang` = `dbinventory`.`barang`.`id_barang`)


 ALTER TABLE `dbinventory`.`keluar_detail` DROP INDEX `id_barang`, ADD INDEX `id_barang` (`id_barang`) USING BTREE;


ALTER TABLE `dbinventory`.`keluar_detail` DROP INDEX `id_keluar`, ADD INDEX `id_keluar` (`id_keluar`) USING BTREE;
