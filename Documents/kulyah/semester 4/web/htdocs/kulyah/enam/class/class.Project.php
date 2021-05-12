<?php

include 'class.Department.php';
class Project extends Connection {
    private $pnumber='';
    private $pname='';
    private $plocation='';
    private $dept;
    private $hasil= false;
    private $message ='';

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

    function __construct(){
        parent::__construct();
        $this->dept=new Department();
    }

    public function SelectAllProject(){
        $sql="SELECT p.*, d.dname 
                FROM project p inner join department d
                on p.dnum=d.dnumber
                order by p.pnumber";
        $result = mysqli_query($this->connection, $sql);
        $arrResult= Array();
        $cnt=0;

        if(mysqli_num_rows($result)>0){
            while ($data=mysqli_fetch_array($result)){
                $objProject = new Project();
                $objProject->pnumber=$data['pnumber'];
                $objProject->pname=$data['pname'];
                $objProject->plocation=$data['plocation'];
                $objProject->dept->dnumber =$data['dnum'];
                $objProject->dept->dname =$data['dname'];
                $arrResult[$cnt] = $objProject;
                $cnt++;
            }
        }
        return $arrResult;
    }
}
?>