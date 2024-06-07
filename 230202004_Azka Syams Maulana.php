<?php 
    session_start();

    class Node {
        public $data, $next;

        public function __construct($d) {
            $this->data = $d;
            $this->next = $this;
        }
    }

    class LinkList {
        public $head, $tail;

        public function __construct() {
            $this->head = $this->tail = null;
        }

        public function LEmpty() {
            if($this->head == null && $this->tail == null) {
                return true;
            }
        }

        public function InsertD($d) {
            $newNode = new Node($d);

            if($this->LEmpty()) {
                $this->head = $this->tail = $newNode;
                $this->tail->next = $this->head;
                return;
            }

            $newNode->next = $this->head;
            $this->head = $newNode;
            $this->tail->next = $this->head;
        }

        public function InsertB($d) {
            $newNode = new Node($d);

            if($this->LEmpty()) {
                $this->head = $this->tail = $newNode;
                $this->tail->next = $this->head;
                return;
            }

            $this->tail->next = $newNode;
            $this->tail = $newNode;
            $this->tail->next = $this->head;
        }

        public function HapusD() {
            if($this->LEmpty()) {
                echo "List Kosong!";
                return;
            }

            if($this->head == $this->tail) {
                $this->head = $this->tail = null;
                echo "Data berhasil dihapus!";
                return;
            }

            $hapus = $this->head;
            $this->head = $this->head->next;
            $this->tail->next = $this->head;
            unset($hapus);
            echo "Data berhasil dihapus!";
        }
        
        public function PrintList() {
            if($this->LEmpty()) {
                echo "List Kosong!";
                return;
            }

            $current = $this->head;
            do {
                echo $current->data . ", ";
                $current = $current->next;
            } while($current != $this->head);
        }
    }   

    if(!isset($_SESSION['linkList'])) {
        $_SESSION['linkList'] = new LinkList();
    }

    print_r($_SESSION['linkList']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azka Syams Maulana</title>
</head>
<body>
    <h2>+++++Single Link List Circular dengan Head dan Tail+++++</h2>
    <h3>MENU:</h3>
    <ol>
        <li><a href="?menu=1">Tambah Data di Depan</a></li>
        <li><a href="?menu=2">Tambah Data di Belakang</a></li>
        <li><a href="?menu=3">Hapus Data di Depan</a></li>
        <li><a href="?menu=4">Cetak Data</a></li>
    </ol>
    <?php 
        if(isset($_GET["menu"])) {
            $menu = $_GET['menu'];
            switch($menu) {
                case "1":
                    ?>
                        <form method="POST">
                            <input type="number" name="data_depan" required placeholder="Masukkan Data">
                            <button type="submit" name="submit_depan">Tambah Data di Depan!</button>
                        </form>

                        <?php 
                        if(isset($_POST['data_depan']) && isset($_POST['submit_depan']))  {
                            $_SESSION['linkList']->InsertD($_POST['data_depan']);
                        }
                        ?>
                    <?php
                    break;
                case "2":
                    ?>
                        <form method="post">
                            <input type="number" name="data_belakang" required placeholder="Masukkan Data">
                            <button type="submit" name="submit_belakang">Tambah Data di Belakang!</button>
                        </form>

                        <?php 
                        if(isset($_POST['data_belakang']) && isset($_POST['submit_belakang']))  {
                            $_SESSION['linkList']->InsertB($_POST['data_belakang']);
                        }
                        ?>
                    <?php
                    break;
                case "3":
                    ?>
                        <form method="post">
                            <button type="submit" name="hapus_depan">Hapus Data di Depan!</button>
                        </form>

                        <?php 
                        if(isset($_POST['hapus_depan'])) {
                            $_SESSION['linkList']->HapusD();
                        }
                        ?>
                    <?php
                    break;
                case "4":
                    ?>
                        <h3>Cetak Data:</h3>
                        <?php 
                        $_SESSION['linkList']->PrintList();
                        ?>
                    <?php
                    break;
                default:
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit();
                    break;
            }
        }
    ?>
</body>
</html>
