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
        private $head, $tail;

        public function __construct() {
            $this->head = null;
            $this->tail = null;
        }

        public function LEmpty() {
            if($this->head == null && $this->tail == null) {
                return true;
            }        
        }

        public function InsertD($d) {
            $newNode = new Node($d);

            if($this->LEmpty()) {
                $this->head = $newNode;
                $this->tail = $newNode;
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
                $this->tail = $newNode;
                return;
            }

            $this->tail->next = $newNode;
            $newNode->prev = $this->tail;
            $this->tail = $newNode;
        }

        public function HapusD() {
            if($this->LEmpty()) {
                echo "List Kosong!";
                return;
            }

            if($this->head->next == null) {
                $this->head = $this->tail = null;
                return;
            }

            $hapus = $this->head;
            $this->head = $this->head->next;
            $this->head->prev = null;
            unset($hapus);
        }

        public function HapusB() {
            if($this->LEmpty()) {
                echo "List Kosong!";
                return;
            }

            if($this->head == $this->tail) {
                $this->head = $this->tail = null;
                return;
            }

            $newTail = $this->tail->prev;
            $newTail->next = null;
            unset($this->tail);
            $this->tail = $newTail;
        }

        public function PrintList() {
            if($this->LEmpty()) {
                echo "List Kosong!";
                return;
            }
            
            $value = $this->head;
            while($value != null) {
                echo $value->data . ", ";
                $value = $value->next;
            }
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
            $this->tail = null;

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
    echo "\n-----------------------------------";
    echo "\n \n";
    echo "Hapus Node Pertama \n";
    $linkList->HapusD();
    echo "Isi Linked List Setelah Node Pertama Dihapus: ";
    $linkList->PrintList();
    echo "\n-----------------------------------\n";
    echo "\n";
    echo "Hapus Node Terakhir \n";
    $linkList->HapusB();
    echo "Isi Linked List Setelah Node Terakhir Dihapus: ";
    $linkList->PrintList();
    echo "\n-----------------------------------\n";
    echo "\n";
    echo "Hapus Semua Node";
    echo "\n";
    $linkList->Clear();
    echo "\n";
    echo "Isi Linked List Setelah Dihapus: ";
    $linkList->PrintList();
    echo "\n-----------------------------------";
?>