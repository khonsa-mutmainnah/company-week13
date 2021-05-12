<?php
class Employee extends Connection {
    private $ssn='';
    private $fname='';
    private $addresst='';
    private $hasil = false;
    private $message='';

    public function __get($atribut){
        if(property_exists($this, $atribut)){
            return $this->atribut;
        }
    }

    public function __set($atribut, $value){
        if(property_exists($this,$atribut)){
            $this->atribut=$value;
        }
    }

    public function AddEmployee(){
        $sql = "INSERT INTO employee(ssn, fname, address)
                VALUES ('$this->ssn', '$this->fname', '$this->address')";
                $this->hasil=mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='data berhasil ditambahkan!';
        else
            $this->message='data gagal ditambahkan';
    }

    public function UpdateEmployee(){
        $sql = "UPDATE employee
                SET fname='$this->fname', address = '$this->address'
                WHERE ssn = '$this->ssn'";
        
        if($this->hasil)
            $this->message='data berhasil diupdate!';
        else
            $this->message='data gagal diupdate';
    }

    public function DeleteEmployee(){
        $sql = "DELETE FROM employee WHERE ssn='$this->ssn'";
        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message='data berhasil dihapus!';
        else
            $this->message='data gagal dihapus';
    }

    public function SelectAllEmployee(){
        $sql="SELECT * FROM employee";
        $result = mysqli_query($this->connection, $sql);
        $arrResult= Array();
        $cnt=0;

        if(mysqli_num_rows($result)>0){
            while ($data=mysqli_fetch_Array($result)){
                $objEmployee = new Employee();
                $objEmployee->ssn=$data['ssn'];
                $objEmployee->fname=$data['fname'];
                $objEmployee->address=$data['address'];
                $arrResult[$cnt]=$objEmployee;
                $cnt++;
            }
        }
        return $arrResult;
    }

    public function SelectOneEmployee(){
        $sql="SELECT* FROM employee WHERE ssn='$this->ssn'";
        $resultOne = mysqli_query($this->connection, $sql);

        if(mysqli_num_rows($resultOne)==1){
            $this->hasil=true;

            $data=mysqli_fetch_assoc($resultOne);
            $this->fname=$data['fname'];
            $this->address=$data['address'];
        }
    }
}
?>