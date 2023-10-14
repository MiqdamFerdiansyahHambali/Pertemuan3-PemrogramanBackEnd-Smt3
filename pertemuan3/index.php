<?php
require_once('Animal.php');

# membuat object
# kirimkan data hewan (array) ke constructor
$animalData = ["Singa", "Gajah", "Jerapah"];
$animal = new Animal($animalData);

echo "Index - Menampilkan seluruh hewan :\n";
$animal->index();

echo "\nStore - Menambahkan hewan baru :\n";
$animal->store("burung");
$animal->index();

echo "\nUpdate - Mengupdate hewan :\n";
$animal->update(0, "Kucing Anggora");
$animal->index();

echo "\nDestroy - Menghapus hewan :\n";
$animal->destroy(1);
$animal->index();
