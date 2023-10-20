<?php
# membuat class Animal
class Animal
{
   private $animals; # property animals

   #  method constructor - untuk mengisi data awal
   # parameter: data hewan (array)
   public function __construct($data)
   {
      $this->animals = $data;
   }

   # method index - menampilkan data animals
   public function index()
   {
      # gunakan foreach untuk menampilkan data animals (array)
      foreach ($this->animals as $index => $animal) {
         echo "[$index] $animal\n";
      }
   }

   # method store - menambahkan hewan baru
   # parameter: hewan baru
   public function store($data)
   {
      # gunakan method array_push untuk menambahkan data baru
      array_push($this->animals, $data);
   }

   # method update - mengupdate hewan
   # parameter: index dan hewan baru
   public function update($index, $data)
   {
      if (isset($this->animals[$index])) {
         $this->animals[$index] = $data;
      } else {
         echo "Data gagal di update.\n";
      }
   }

   # method delete - menghapus hewan
   # parameter: index
   public function destroy($index)
   {
      # gunakan method unset atau array_splice untuk menghapus data array
      if (isset($this->animals[$index])) {
         unset($this->animals[$index]);
         $this->animals = array_values($this->animals);
      } else {
         echo "Data gagal di delete.\n";
      }
   }
}
