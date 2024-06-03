<?php
    class Node {
        public $data;
        public $next;
        public $prev;

        public function __construct($d) { 
            $this->data = $d;
            $this->next = null;
            $this->prev = null;
        }
    }

    class LinkList {
        private $head;

        public function __construct() {
            $this->head = null;
        }

        public function LEmpty() {
            if($this->head == null) {
                return true;
            }
        }

        public function InsertD($d) {
            $newNode = new Node($d);

            if($this->LEmpty()) {
                $this->head = $newNode;
                return;
            }

            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        }

        public function InsertB($d) {
            $newNode = new Node($d);

            if($this->LEmpty()) {
                $this->head = $newNode;
                return;
            }

            $temp = $this->head;
            while($temp->next != null) {
                $temp = $temp->next;
            }
            $temp->next = $newNode;
            $newNode->prev = $temp;
            $newNode->next = null;
        }

        public function HapusD() {
            if($this->LEmpty()) {
                echo "List Kosong!";
                return;
            }

            if($this->head->next == null) {
                $this->head = null;
                return;
            }

            $hapus = $this->head;
            $this->head = $this->head->next;
            $this->head->prev = null;
            $hapus->next = null;
            unset($hapus);
        }

        public function HapusB() {
            if($this->LEmpty()) {
                echo "List Kosong!";
                return;
            }

            if($this->head->next == null) {
                $this->head = null;
                return;
            }
            
            $temp = $this->head;
            while($temp->next->next != null) {
                $temp = $temp->next;
            }
            $hapus = $temp->next;
            $temp->next = null;
            $hapus->prev = null;
            unset($hapus);
        }

        public function PrintList() {
            if($this->head == null) {
                echo "List Kosong!";
                return;
            }

            $current = $this->head;
            while($current != null) {
                echo $current->data . ", ";
                $current = $current->next;
            }

            echo "\n";
        }

        public function Clear() {
            if($this->LEmpty()) {
                echo "List Kosong!";
                return;
            }

            $temp = $this->head;
            $hapus = null;

            while($temp != null) {
                $hapus = $temp;
                $temp = $temp->next;
                unset($hapus);
            }

            $this->head = null;

            echo "List Berhasil Dihapus!";
        }
    }

    $linkList = new LinkList();
    $linkList->InsertD(11);
    $linkList->InsertD(55);
    $linkList->InsertD(33);
    $linkList->InsertB(44);
    echo "Isi Linked List: ";
    $linkList->PrintList();
    echo "-----------------------------------";
    echo "\n \n";
    echo "Hapus Node Pertama \n";
    $linkList->HapusD();
    echo "Isi Linked List Setelah Node Pertama Dihapus: ";
    $linkList->PrintList();
    echo "-----------------------------------\n";
    echo "\n";
    echo "Hapus Node Terakhir \n";
    $linkList->HapusB();
    echo "Isi Linked List Setelah Node Terakhir Dihapus: ";
    $linkList->PrintList();
    echo "-----------------------------------\n";
    echo "\n";
    echo "Hapus Semua Node";
    echo "\n";
    $linkList->Clear();
    echo "\n";
    echo "Isi Linked List Setelah Dihapus: ";
    $linkList->PrintList();
    echo "\n-----------------------------------";
?>